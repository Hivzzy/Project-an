<?php

namespace App\Http\Controllers;

use App\Models\MonthlyReport;
use Ramsey\Uuid\Uuid;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;

class PayrollController extends Controller
{
    public function uploadExcel(Request $request)
    {
        if ($request->hasFile('file')) {
            $publicPath = public_path('/file_payroll/' . null);
            $hasFiles = File::exists($publicPath);
            if ($hasFiles) {
                File::deleteDirectory($publicPath);
            }
            $file = $request->file('file');
            $nama_file_asli = $file->getClientOriginalName();
            $file->move('file_payroll', $nama_file_asli);
            $sheetName = 'PAYROLL';

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path('/file_payroll/' . $nama_file_asli));
            $sheetNames = $spreadsheet->getSheetNames();

            if (!in_array($sheetName, $sheetNames)) {
                return redirect()->route('show.data')->with('failed', '<strong>SHEET PAYROLL TIDAK TERSEDIA</strong>, nama sheet harus <strong>PAYROLL</strong>.');
            }

            $sheet = $spreadsheet->getSheetByName($sheetName);
            $data = $sheet->toArray();
            $csvData = '';

            if (is_array($data)) {
                if ($data[5][1] === null) {
                    return redirect()->route('show.data')->with('failed', '<strong>DATA SHEET PAYROLL KOSONG</strong>, masukkan file yang benar.');
                }
                $numRows = count($data);
                $numColumns = count($data[0]);

                for ($row = 0; $row < $numRows; $row++) {
                    $columnData = [];
                    $isEnoughRow = false;
                    for ($column = 0; $column < $numColumns; $column++) {
                        $value = $data[$row][$column];
                        $formattedValue = str_replace(',', '', $value);
                        $columnData[] = $formattedValue;
                        if ($data[$row][0] == 'TOTAL') {
                            $isEnoughRow = true;
                            break;
                        }
                    }
                    if ($isEnoughRow) {
                        break;
                    }
                    $csvData .= implode(',', $columnData) . "\n";
                }
            }

            file_put_contents(public_path('/file_payroll/' . $nama_file_asli), $csvData);
            Payroll::truncate();
            MonthlyReport::truncate();

            (new DaftarGaji)->import(public_path('/file_payroll/' . $nama_file_asli), null, \Maatwebsite\Excel\Excel::CSV);
            (new PayrollInfo)->import(public_path('/file_payroll/' . $nama_file_asli), null, \Maatwebsite\Excel\Excel::CSV);
            return redirect()->route('show.data')->with('success', '<strong>DATA EXCEL BERHASIL DI UPLOAD</strong>.');
        } else {
            return redirect()->route('show.data')->with('failed', '<strong>FILE TIDAK BOLEH KOSONG</strong>, silahkan pilih file terlebih dahulu.');
        }
    }

    public function resetData()
    {
        Payroll::truncate();
        MonthlyReport::truncate();
        return redirect()->route('show.data');
    }

    public function getInformationDashboard()
    {
        $monthlyInformation = MonthlyReport::all();
        $summaryEmployees   = Payroll::sum('id');
        dd($summaryEmployees);
        return view('pages.dashboardView', [
            'data'  => $monthlyInformation,
            'sum'   => $summaryEmployees,
        ]);
    }
}

class DaftarGaji implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Payroll([
            'id'            => Uuid::uuid4()->toString(),
            'nama_karyawan' => $row['nama_karyawan'],
            'email'         => $row['email'],
            'jabatan'       => $row['jabatan'],
            'hari_kerja'    => $row['jumlah_hari_kerja'],
            'gaji_perhari'  => $row['gaji_perhari'],
            'gaji_kotor'    => $row['total'],
            'tambahan'      => $row['tambahan'],
            'kasbon'        => $row['kasbon'],
            'gaji_bersih'   => $row['total_yang_di_terima']
        ]);
    }

    public function headingRow(): int
    {
        return 5;
    }
}

class PayrollInfo implements ToModel, WithMappedCells
{
    use Importable;

    private function valueTotal()
    {
        $value = [];
        $value[0] = Payroll::sum('gaji_perhari');
        $value[1] = Payroll::sum('gaji_kotor');
        $value[2] = Payroll::sum('tambahan');
        $value[3] = Payroll::sum('kasbon');
        $value[4] = Payroll::sum('gaji_bersih');
        return $value;
    }

    public function mapping(): array
    {
        return [
            'periode' => 'A3',
        ];
    }

    public function model(array $row)
    {
        $data = PayrollInfo::valueTotal();
        $tot_gaji_perhari   = $data[0];
        $tot_gaji_kotor     = $data[1];
        $tot_tambahan       = $data[2];
        $tot_kasbon         = $data[3];
        $tot_gaji_bersih    = $data[4];

        $periode = strstr($row['periode'], "PERIODE");

        return new MonthlyReport([
            'periode'           => $periode,
            'tot_gaji_perhari'  => $tot_gaji_perhari,
            'tot_gaji_kotor'    => $tot_gaji_kotor,
            'tot_tambahan'      => $tot_tambahan,
            'tot_kasbon'        => $tot_kasbon,
            'tot_gaji_bersih'   => $tot_gaji_bersih,
        ]);
    }
}
