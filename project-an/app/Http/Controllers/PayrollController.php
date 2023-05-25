<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Payroll;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PayrollController extends Controller
{
    public function uploadExcel(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $nama_file_asli = $file->getClientOriginalName();
            $file->move('file_payroll', $nama_file_asli);
            $sheetName = 'PAYROLL';

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(public_path('/file_payroll/' . $nama_file_asli));
            $sheetNames = $spreadsheet->getSheetNames();

            if (!in_array($sheetName, $sheetNames)) {
                return 'Lembar kerja tidak ditemukan.';
            }

            $sheet = $spreadsheet->getSheetByName($sheetName);
            $data = $sheet->toArray();
            $csvData = '';

            if (is_array($data)) {
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

            (new DaftarGaji)->import(public_path('/file_payroll/' . $nama_file_asli), null, \Maatwebsite\Excel\Excel::CSV);
            return redirect()->route('show.data');
        } else {
            // return redirect()->back()->withInput()->withErrors(['error' => 'Data tidak boleh kosong.']);
        }
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
