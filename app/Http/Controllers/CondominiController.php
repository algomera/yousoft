<?php

namespace App\Http\Controllers;

use App\Practice;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CondominiController extends Controller
{
    private $practice;
    private $applicant;
    private $condomini;
    private $spreadsheet;

    public function generateSpreadsheet($practice) {
        // Set datas from practice
        $this->practice = $practice;
        $this->applicant = $this->practice->applicant;
        $this->condomini = $this->practice->condomini;

        // Create Spreadsheet
        $this->spreadsheet = new Spreadsheet();

        // Create Sheets
        $main = $this->spreadsheet->getActiveSheet();
        $this->spreadsheet->setActiveSheetIndex(0);
        $main->setTitle($this->applicant->company_name ?: 'Scheda 1');
        $ceilings = $this->spreadsheet->createSheet();
        $ceilings->setTitle('Calcolo massimali');
        $list = $this->spreadsheet->createSheet();
        $list->setTitle('Lista condomini');


        // LIST SHEET
        $this->listGenerateCells($list);

        // MAIN SHEET
        $this->mainGenerateCells($main);
        $this->mainApplyStylesToCells($main);
        $this->mainSetColRowDimension();

        // CEILING SHEET
        $this->ceilingsGenerateCells($ceilings);
        $this->ceilingsSetColRowDimension();



        // Redirect output to client browser and setup file name, then auto download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="condomini-' . now() . '.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($this->spreadsheet, 'Xlsx');
        $writer->save('php://output');
        die;
    }

    private function mainGenerateCells($sheet) {
        $sheet->setCellValue('A1', 'TABELLA RIEPILOGATIVA');
        $sheet->setCellValue('A3', 'SOGGETTO/I RICHIEDENTE/I');
        $sheet->setCellValue('A4', $this->applicant->company_name);
        $sheet->mergeCells('A4:B4');
        $sheet->setCellValue('C4', $this->practice->address . ' ' . $this->practice->civic . ' ' . $this->practice->common . ' ' . $this->practice->province);
        $sheet->mergeCells('C4:P4');
        $sheet->setCellValue('A6', 'INQUADRAMENTO INTERVENTI');
        $sheet->mergeCells('A6:B6');
        $sheet->setCellValueExplicit('C6', "==>", DataType::TYPE_STRING);
        $sheet->setCellValue('D6', 'Condominio');
        $sheet->setCellValue('E6', '1');
        $sheet->setCellValue('D7', 'N. Unità');
        $sheet->setCellValue('E7', $this->condomini->count());
        $sheet->setCellValue('D8', 'Colonnine');
        $sheet->setCellValue('E8', '0');
        $sheet->setCellValue('G8', 'Massimale di spesa IVA inclusa');
        $sheet->mergeCells('G8:G10');
        $sheet->setCellValue('H8', 'PROGETTO');
        $sheet->mergeCells('H8:P8');
        $sheet->setCellValue('H9', 'Lavori');
        $sheet->mergeCells('H9:H10');
        $sheet->setCellValue('I9', 'Progettazione');
        $sheet->mergeCells('I9:J9');
        $sheet->setCellValue('I10', 20/100);
        $sheet->getStyle('I10')->getNumberFormat()->setFormatCode('0.0000%');
        $sheet->setCellValue('J10', 2.7366/100);
        $sheet->getStyle('J10')->getNumberFormat()->setFormatCode('0.0000%');
        $sheet->setCellValue('K9', 'Prime Hub');
        $sheet->setCellValue('K10', 3.5/100);
        $sheet->getStyle('K10')->getNumberFormat()->setFormatCode('0.0000%');
        $sheet->setCellValue('L9', 'Asseverazione');
        $sheet->mergeCells('L9:M9');
        $sheet->setCellValue('L10', 2.4/100);
        $sheet->getStyle('L10')->getNumberFormat()->setFormatCode('0.0000%');
        $sheet->setCellValue('M10', 3.1595/100);
        $sheet->getStyle('M10')->getNumberFormat()->setFormatCode('0.0000%');
        $sheet->setCellValue('N9', 'IVA 10%');
        $sheet->mergeCells('N9:N10');
        $sheet->setCellValue('O9', 'IVA 22%');
        $sheet->mergeCells('O9:O10');
        $sheet->setCellValue('P9', 'Sommano');
        $sheet->mergeCells('P9:P10');

        $sheet->mergeCells('A11:A12');
        $sheet->setCellValue('B11', 'Trainanti');
        $sheet->mergeCells('B11:B12');
        $sheet->setCellValue('C11', 'Isolamento');
        $sheet->mergeCells('C11:E11');
        $sheet->setCellValue('G11', "=IF(E7<9,E7*'Calcolo massimali'!C2,(8*'Calcolo massimali'!C2)+((E7-8)*'Calcolo massimali'!D2))");
        $this->generateCalculationCells($sheet);
        $sheet->setCellValue('C12', 'Sostituzione Impianti');
        $sheet->mergeCells('C12:E12');
        $sheet->setCellValue('G12', "=IF(E7<9,E7*'Calcolo massimali'!C2,(8*'Calcolo massimali'!C2)+((E7-8)*'Calcolo massimali'!D2))");
        $this->generateCalculationCells($sheet);
        $sheet->mergeCells('A13:A16');
        $sheet->setCellValue('B13', 'Parti Comuni');
        $this->generateCalculationCells($sheet);
        $sheet->mergeCells('B13:B16');
        $sheet->setCellValue('C13', 'Serramenti');
        $this->generateCalculationCells($sheet);
        $sheet->mergeCells('C13:E13');
        $sheet->setCellValue('C14', 'Fotovoltaico');
        $this->generateCalculationCells($sheet);
        $sheet->mergeCells('C14:E14');
        $sheet->setCellValue('C15', 'Sist. Accumulo');
        $this->generateCalculationCells($sheet);
        $sheet->mergeCells('C15:E15');
        $sheet->setCellValue('C16', 'Infr. ricarica');
        $this->generateCalculationCells($sheet);
        $sheet->mergeCells('C16:E16');

        // Loop condomini
        foreach ($this->condomini as $i => $condomino) {
            $sheet->setCellValue('A' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), $i + 1);
            $sheet->setCellValue('B' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), $condomino->name . ' ' . $condomino->surname);
            $sheet->mergeCells('A' . ($this->spreadsheet->getActiveSheet()->getHighestRow()) . ':A' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 2));
            $sheet->mergeCells('B' . ($this->spreadsheet->getActiveSheet()->getHighestRow()) . ':B' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 2));
            $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), 'Serramenti');
            $sheet->setCellValue('G' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "='Calcolo massimali'!\$B$12");
            $this->generateCalculationCells($sheet);
            $sheet->mergeCells('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow()) . ':E' . ($this->spreadsheet->getActiveSheet()->getHighestRow()));
            $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Schermature');
            $sheet->setCellValue('G' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "='Calcolo massimali'!\$B$12");
            $this->generateCalculationCells($sheet);
            $sheet->mergeCells('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow()) . ':E' . ($this->spreadsheet->getActiveSheet()->getHighestRow()));
            $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'BACS');
            $sheet->setCellValue('G' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "='Calcolo massimali'!\$B$14");
            $this->generateCalculationCells($sheet);
            $sheet->mergeCells('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow()) . ':E' . ($this->spreadsheet->getActiveSheet()->getHighestRow()));
            $sheet->mergeCells('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow()) . ':E' . ($this->spreadsheet->getActiveSheet()->getHighestRow()));
        }

        $sheet->getStyle('A11:B' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFE0BBB9'
                ]
            ],
        ]);
        $sheet->getStyle('A11:P' . ($this->spreadsheet->getActiveSheet()->getHighestRow()))->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        $sheet->setCellValue('E' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Somme');
        $sheet->mergeCells('E' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':F' . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->getStyle('E' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
            'font' => [
                'bold' => true
            ]
        ]);

        $sheet->getStyle('G8:G' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFFFFEA6'
                ]
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'wrapText' => true
            ]
        ]);
        $sheet->getStyle('P9:P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFB0FBA3'
                ]
            ],
        ]);

        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(H11:H". ($this->spreadsheet->getActiveSheet()->getHighestRow() - 1) .")");
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(I11:I". ($this->spreadsheet->getActiveSheet()->getHighestRow() - 1) .")");
        $sheet->setCellValue('J' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(J11:J". ($this->spreadsheet->getActiveSheet()->getHighestRow() - 1) .")");
        $sheet->setCellValue('K' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(K11:K". ($this->spreadsheet->getActiveSheet()->getHighestRow() - 1) .")");
        $sheet->setCellValue('L' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(L11:L". ($this->spreadsheet->getActiveSheet()->getHighestRow() - 1) .")");
        $sheet->setCellValue('M' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(M11:M". ($this->spreadsheet->getActiveSheet()->getHighestRow() - 1) .")");
        $sheet->setCellValue('N' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(N11:N". ($this->spreadsheet->getActiveSheet()->getHighestRow() - 1) .")");
        $sheet->setCellValue('O' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(O11:O". ($this->spreadsheet->getActiveSheet()->getHighestRow() - 1) .")");
        $sheet->setCellValue('P' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(P11:P". ($this->spreadsheet->getActiveSheet()->getHighestRow() - 1) .")");

        $sheet->getStyle('G11:P'.$this->spreadsheet->getActiveSheet()->getHighestRow())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

        // Cessione
        $sheet->setCellValue('N' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 2), 'Cessione');
        $sheet->getStyle('N' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'font' => [
                'bold' => true,
                'italic' => true,
                'size' => '12'
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ]
        ]);

        $sheet->mergeCells('N' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':O' . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('P' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=P" . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 2) . "*1.1");
        $sheet->getStyle('P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

        $sheet->getStyle('P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'font' => [
                'bold' => true,
                'italic' => true,
                'size' => '12',
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFB0FBA3'
                ]
            ],
        ]);

        $sheet->getStyle('N' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        // Prezzo d'acquisto 101
        $sheet->setCellValue('N' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 2), 'Prezzo d\'acquisto 101');
        $sheet->getStyle('N' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'font' => [
                'bold' => true,
                'italic' => true,
                'size' => '12'
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ]
        ]);

        $sheet->mergeCells('N' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':O' . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('P' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=P" . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 4) . "*1.01");
        $sheet->getStyle('P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
        $sheet->getStyle('P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'font' => [
                'bold' => true,
                'italic' => true,
                'size' => '12',
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFB0FBA3'
                ]
            ],
        ]);
        $sheet->getStyle('N' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        // Guadagno o perdita
        $sheet->setCellValue('N' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 2), 'Guadagno o Perdita');
        $sheet->getStyle('N' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'font' => [
                'bold' => true,
                'italic' => true,
                'size' => '12'
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ]
        ]);

        $sheet->mergeCells('N' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':O' . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('P' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=P" . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 2) . "-P" . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 6));
        $sheet->getStyle('P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
        $sheet->getStyle('P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'font' => [
                'bold' => true,
                'italic' => true,
                'size' => '12',
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFB0FBA3'
                ]
            ],
        ]);
        $sheet->getStyle('N' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        $sheet->setCellValue('G' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 2), 'TOT. COSTI NOI');
        $sheet->setCellValue('H' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), 'TOT. CMP');
        $sheet->setCellValue('I' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), 'UTILE');
        $sheet->setCellValue('J' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), 'MARGINE %');
        $sheet->getStyle('G' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':J' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFE0EAF5'
                ]
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $riga_somme = 11 + ($this->condomini->count() * 3) + 6;
        $sheet->setCellValue('A' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'PRATICA ' . $this->practice->id);
        $sheet->mergeCells('A' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':A' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 18));
        $sheet->setCellValue('B' . $this->spreadsheet->getActiveSheet()->getHighestRow(), 'TOTALE TRAINATI E COMUNI');
        $sheet->mergeCells('B' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':B' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 18));

        $sheet->setCellValue('C' . $this->spreadsheet->getActiveSheet()->getHighestRow(), 'Serramenti');
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUMIF(\$C$11:\$C$" . ($riga_somme - 1) . ",\$C". $this->spreadsheet->getActiveSheet()->getHighestRow() .",\$H$11:\$H$". ($riga_somme - 1) .")");
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('J' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=I" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."/H" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Schermature');
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUMIF(\$C$11:\$C$" . ($riga_somme - 1) . ",\$C". $this->spreadsheet->getActiveSheet()->getHighestRow() .",\$H$11:\$H$". ($riga_somme - 1) .")");
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('J' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=I" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."/H" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'BACS');
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUMIF(\$C$11:\$C$" . ($riga_somme - 1) . ",\$C". $this->spreadsheet->getActiveSheet()->getHighestRow() .",\$H$11:\$H$". ($riga_somme - 1) .")");
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow() . "-G" . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1));
        $sheet->setCellValue('J' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=I" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."/H" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Elettricista (building automation)');
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Fotovoltaico');
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUMIF(\$C$11:\$C$" . ($riga_somme - 1) . ",\$C". $this->spreadsheet->getActiveSheet()->getHighestRow() .",\$H$11:\$H$". ($riga_somme - 1) .")");
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."+H" . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1) . "+H" . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 2) . "-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('J' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=I" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."/H" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Infr. Ricarica');
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUMIF(\$C$11:\$C$" . ($riga_somme - 1) . ",\$C". $this->spreadsheet->getActiveSheet()->getHighestRow() .",\$H$11:\$H$". ($riga_somme - 1) .")");
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Sist. Accumulo');
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUMIF(\$C$11:\$C$" . ($riga_somme - 1) . ",\$C". $this->spreadsheet->getActiveSheet()->getHighestRow() .",\$H$11:\$H$". ($riga_somme - 1) .")");
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Isolamento');
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUMIF(\$C$11:\$C$" . ($riga_somme - 1) . ",\$C". $this->spreadsheet->getActiveSheet()->getHighestRow() .",\$H$11:\$H$". ($riga_somme - 1) .")");
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow() . "-G" . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1));
        $sheet->setCellValue('J' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=I" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."/H" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Lattoneria (edile)');
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Sostituzione impianti');
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUMIF(\$C$11:\$C$" . ($riga_somme - 1) . ",\$C". $this->spreadsheet->getActiveSheet()->getHighestRow() .",\$H$11:\$H$". ($riga_somme - 1) .")");
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."+H" . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1) . "-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('J' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=I" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."/H" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Riscaldamento');
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUMIF(\$C$11:\$C$" . ($riga_somme - 1) . ",\$C". $this->spreadsheet->getActiveSheet()->getHighestRow() .",\$H$11:\$H$". ($riga_somme - 1) .")");
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Progetto');
        $sheet->setCellValue('G' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $riga_somme . "*10%");
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=I" . $riga_somme);
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('J' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=I" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."/H" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Asseverazione Tecnica');
        $sheet->setCellValue('G' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=L" . $riga_somme);
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('J' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=I" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."/H" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Asseverazione Fiscale');
        $sheet->setCellValue('G' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=M" . $riga_somme);
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('J' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=I" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."/H" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Polizze 2% tutto tranne IVA');
        $sheet->setCellValue('F' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), 2/100);
        $sheet->getStyle('F' . $this->spreadsheet->getActiveSheet()->getHighestRow())->getNumberFormat()->setFormatCode('0.00%');
        $sheet->setCellValue('G' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(H" . $riga_somme . ":M" . $riga_somme . ")*F" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Fascicolazione 3.5');
        $sheet->setCellValue('F' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), 3.5/100);
        $sheet->getStyle('F' . $this->spreadsheet->getActiveSheet()->getHighestRow())->getNumberFormat()->setFormatCode('0.00%');
        $sheet->setCellValue('G' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=P" . $riga_somme . "*F" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Supporto alla progettazione');
        $sheet->setCellValue('G' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=J" . $riga_somme);
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Costi aggiuntivi Cantiere');
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->setCellValue('C' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 1), 'Banca acquisizione crediti');
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=H" . $this->spreadsheet->getActiveSheet()->getHighestRow() ."-G" . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->mergeCells('C' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':E' . $this->spreadsheet->getActiveSheet()->getHighestRow());

        $sheet->getStyle('A' . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 18) . ':B' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFE0BBB9'
                ]
            ],
            'font' => [
                'bold' => true
            ],
        ]);
        $sheet->getStyle('A' . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 18) . ':J' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);

        $sheet->setCellValue('E' . ($this->spreadsheet->getActiveSheet()->getHighestRow() + 2), 'Sommano complessivi');
        $sheet->mergeCells('E' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':F' . $this->spreadsheet->getActiveSheet()->getHighestRow());
        $sheet->setCellValue('G' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(G" . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 20) . ":G" . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 2) . ")");
        $sheet->setCellValue('H' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(H" . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 20) . ":H" . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 2) . ")");
        $sheet->setCellValue('I' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(I" . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 20) . ":I" . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 2) . ")");
        $sheet->setCellValue('J' . $this->spreadsheet->getActiveSheet()->getHighestRow(), "=SUM(I" . $this->spreadsheet->getActiveSheet()->getHighestRow() . "/H" . $this->spreadsheet->getActiveSheet()->getHighestRow() . ")");
        $sheet->getStyle('J' . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 20) . ':J' . $this->spreadsheet->getActiveSheet()->getHighestRow())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);
        $sheet->getStyle('J' . $this->spreadsheet->getActiveSheet()->getHighestRow())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);

        $sheet->getStyle('G' . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 20) . ':I' . $this->spreadsheet->getActiveSheet()->getHighestRow())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
        $sheet->getStyle('J' . ($this->spreadsheet->getActiveSheet()->getHighestRow() - 20) . ':J' . $this->spreadsheet->getActiveSheet()->getHighestRow())->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_PERCENTAGE_00);

        $sheet->getStyle('E' . $this->spreadsheet->getActiveSheet()->getHighestRow() . ':J' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
            'font' => [
                'bold' => true,
                'italic' => true,
                'size' => '12',
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
    }

    private function generateCalculationCells($sheet) {
        $sheet->setCellValue('I' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "=ROUND(H". $this->spreadsheet->getActiveSheet()->getHighestRow() . "*\$I$10,2)");
        $sheet->setCellValue('J' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "=ROUND(H". $this->spreadsheet->getActiveSheet()->getHighestRow() . "*\$J$10,2)");
        $sheet->setCellValue('K' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "=ROUND(H". $this->spreadsheet->getActiveSheet()->getHighestRow() . "*\$K$10,2)");
        $sheet->setCellValue('L' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "=ROUND(H". $this->spreadsheet->getActiveSheet()->getHighestRow() . "*\$L$10,2)");
        $sheet->setCellValue('M' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "=ROUND(H". $this->spreadsheet->getActiveSheet()->getHighestRow() . "*\$M$10,2)");
        $sheet->setCellValue('N' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "=ROUND(H". $this->spreadsheet->getActiveSheet()->getHighestRow() . "*0.1,2)");
        $sheet->setCellValue('O' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "=ROUND(SUM(I" . $this->spreadsheet->getActiveSheet()->getHighestRow() . ":M" . $this->spreadsheet->getActiveSheet()->getHighestRow() . ")*0.22,2)");
        $sheet->setCellValue('P' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "=SUM(H" . $this->spreadsheet->getActiveSheet()->getHighestRow() . ":O" . $this->spreadsheet->getActiveSheet()->getHighestRow() . ")");
        $sheet->setCellValue('Q' . ($this->spreadsheet->getActiveSheet()->getHighestRow()), "=IF(P" . $this->spreadsheet->getActiveSheet()->getHighestRow() . "<=G" . $this->spreadsheet->getActiveSheet()->getHighestRow() . ",\"Ok\",\"ATTENZIONE\")");
    }

    private function mainApplyStylesToCells($sheet) {
        $sheet->getStyle('A:Z')->applyFromArray([
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER
            ],
        ]);

        // Set single cell style
        $sheet->getStyle('A1')->applyFromArray([
            'font' => [
                'bold' => true
            ],
        ]);
        $sheet->getStyle('A4')->applyFromArray([
            'font' => [
                'bold' => true
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $sheet->getStyle('B4')->applyFromArray([
            'font' => [
                'bold' => true
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $sheet->getStyle('C4:P4')->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER
            ],
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $sheet->getStyle('C6')->applyFromArray([
            'font' => [
                'bold' => true,
                'underline' => true,
            ],
        ]);
        $sheet->getStyle('D6:E8')->applyFromArray([
            'font' => [
                'bold' => true,
                'underline' => true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
        ]);
        $sheet->getStyle('G8:G10')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFFFFEA6'
                ]
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'wrapText' => true
            ]
        ]);
        $sheet->getStyle('G8:P10')->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'wrapText' => true
            ]
        ]);
//        $sheet->getStyle('G8:G' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
//            'fill' => [
//                'fillType' => Fill::FILL_SOLID,
//                'color' => [
//                    'argb' => 'FFFFFEA6'
//                ]
//            ],
//        ]);
        $sheet->getStyle('H8:P8')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);
        $sheet->getStyle('I10:M10')->applyFromArray([
            'font' => [
                'size' => '9'
            ]
        ]);
        $sheet->getStyle('K10:M10')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'argb' => 'FFFFFEA6'
                ]
            ],
        ]);
//        $sheet->getStyle('P9:P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
//            'fill' => [
//                'fillType' => Fill::FILL_SOLID,
//                'color' => [
//                    'argb' => 'FFB0FBA3'
//                ]
//            ],
//        ]);
//        $sheet->getStyle('A11:P' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
//            'borders' => [
//                'allBorders' => [
//                    'borderStyle' => Border::BORDER_THIN,
//                    'color' => ['argb' => 'FF000000'],
//                ],
//            ],
//        ]);
//        $sheet->getStyle('A11:B' . $this->spreadsheet->getActiveSheet()->getHighestRow())->applyFromArray([
//            'fill' => [
//                'fillType' => Fill::FILL_SOLID,
//                'color' => [
//                    'argb' => 'FFE0BBB9'
//                ]
//            ],
//        ]);

        $conditional = new Conditional();
        $conditional->setConditionType(Conditional::CONDITION_CELLIS);
        $conditional->setOperatorType(Conditional::OPERATOR_EQUAL);
        $conditional->addCondition("\"ATTENZIONE\"");
        $conditional->getStyle()->getFont()->getColor()->setARGB(Color::COLOR_RED);
        $conditional->getStyle()->getFont()->setBold(true);
        $conditionalStyles = $sheet->getStyle('Q11:Q' . $this->spreadsheet->getActiveSheet()->getHighestRow())->getConditionalStyles();
        $conditionalStyles[] = $conditional;

        $sheet->getStyle('Q11:Q' . $this->spreadsheet->getActiveSheet()->getHighestRow())->setConditionalStyles($conditionalStyles);
    }

    private function ceilingsGenerateCells($sheet)
    {
        $sheet->setCellValue('A1', 'TRAINANTI');
        $sheet->setCellValue('A2', 'Involucro > 25%');
        $sheet->setCellValue('A3', 'Riscaldamento Centralizzato');
        $sheet->setCellValue('A4', 'Riscaldamento Autonomo');
        $sheet->setCellValue('A5', 'Sismica');
        $sheet->setCellValue('B1', 'Singola');
        $sheet->setCellValue('C1', 'Da 2 a 8');
        $sheet->setCellValue('D1', 'Da 8+');

        $sheet->setCellValue('A9', 'TRAINATI');
        $sheet->setCellValue('A10', 'Coibentazione involucro (compresi serramenti)');
        $sheet->setCellValue('A11', 'Sostituzione impianto riscaldamento autonomo');
        $sheet->setCellValue('A12', 'Schermature Solari');
        $sheet->setCellValue('A13', 'Caldaie a Biomassa');
        $sheet->setCellValue('A14', 'BACS - Sistemi multimediali controllo impianti');
        $sheet->setCellValue('A15', 'Microgeneratori');
        $sheet->setCellValue('A16', 'Impianto Fotovoltaico');
        $sheet->setCellValue('A17', 'Impianto Fotovoltaico ristrutturazione');
        $sheet->setCellValue('A18', 'Accumulo Elettrico');

        $sheet->setCellValue('B19', 'Singola');
        $sheet->setCellValue('C19', 'Da 2 a 8');
        $sheet->setCellValue('D19', 'Da 8+');
        $sheet->setCellValue('A20', 'Colonnina ricarica veicoli elettrici');

        // Fake data for testing - Fake data for testing
        $sheet->setCellValue('B2', 50000);
        $sheet->setCellValue('C2', 40000);
        $sheet->setCellValue('D2', 30000);
        $sheet->setCellValue('C3', 20000);
        $sheet->setCellValue('D3', 15000);
        $sheet->setCellValue('B4', 30000);
        $sheet->setCellValue('B5', 96000);
        $sheet->setCellValue('C5', 96000);
        $sheet->setCellValue('D5', 96000);
        $sheet->getStyle('B2:D5')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

        $sheet->setCellValue('B10', 54545.45);
        $sheet->setCellValue('B11', 27272.73);
        $sheet->setCellValue('B12', 54545.45);
        $sheet->setCellValue('B13', 27272.73);
        $sheet->setCellValue('B14', 13636.36);
        $sheet->setCellValue('B15', 90909.09);
        $sheet->setCellValue('B16', 2400);
        $sheet->setCellValue('C16', 'x Kw');
        $sheet->setCellValue('B17', 1600);
        $sheet->setCellValue('C17', 'x Kw');
        $sheet->setCellValue('B18', 1000);
        $sheet->setCellValue('C18', 'x Kw');
        $sheet->getStyle('B10:B18')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);

        $sheet->setCellValue('B20', 2000);
        $sheet->setCellValue('C20', 1500);
        $sheet->setCellValue('D20', 1200);
        $sheet->getStyle('B20:D20')->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE);
    }

    private function listGenerateCells($sheet) {
        $sheet->setCellValue('A1', 'N.');
        $sheet->setCellValue('B1', 'Nome');
        $sheet->setCellValue('C1', 'Cognome');
        $sheet->setCellValue('D1', 'Codice fiscale');
        $sheet->setCellValue('E1', 'Millesimi');
        $sheet->setCellValue('F1', 'Telefono');
        $sheet->setCellValue('G1', 'Email');
        $sheet->setCellValue('H1', 'Foglio');
        $sheet->setCellValue('I1', 'Particella');
        $sheet->setCellValue('J1', 'Subalterno');
        $sheet->setCellValue('K1', 'Categoria catastale');
        $sheet->setCellValue('L1', 'Superficie catastale');

        // Loop condomini
        foreach ($this->condomini as $i => $condomino) {
            $sheet->setCellValue('A' . ($i + 2), $i + 1);
            $sheet->setCellValue('B' . ($i + 2), $condomino->name);
            $sheet->setCellValue('C' . ($i + 2), $condomino->surname);
            $sheet->setCellValue('D' . ($i + 2), $condomino->cf);
            $sheet->setCellValue('E' . ($i + 2), $condomino->millesimi_inv);
            $sheet->setCellValue('F' . ($i + 2), $condomino->phone);
            $sheet->setCellValue('G' . ($i + 2), $condomino->email);
            $sheet->setCellValue('H' . ($i + 2), $condomino->foglio);
            $sheet->setCellValue('I' . ($i + 2), $condomino->part);
            $sheet->setCellValue('J' . ($i + 2), $condomino->sub);
            $sheet->setCellValue('K' . ($i + 2), $condomino->categ_catastale);
            $sheet->setCellValue('L' . ($i + 2), $condomino->sup_catastale);
        }

        foreach ($sheet->getColumnIterator() as $column) {
            $sheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
        }

        $sheet->getStyle('A1:L1')->applyFromArray([
            'font' => [
                'bold' => true
            ]
        ]);
    }

    private function mainSetColRowDimension() {
        foreach (range('A', $this->spreadsheet->getActiveSheet()->getHighestColumn()) as $col) {
            $this->spreadsheet->getActiveSheet()->getColumnDimension($col)->setWidth(90, 'px');
        }
        $this->spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(180, 'px');

        foreach (range(1, $this->spreadsheet->getActiveSheet()->getHighestRow()) as $row) {
            $this->spreadsheet->getActiveSheet()->getRowDimension($row)->setRowHeight(20, 'px');
        }
    }
    private function ceilingsSetColRowDimension() {
        foreach (range('A', $this->spreadsheet->getActiveSheet()->getHighestColumn()) as $col) {
            $this->spreadsheet->getActiveSheet()->getColumnDimension($col)->setWidth(90, 'px');
        }
        $this->spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(310, 'px');

        foreach (range(1, $this->spreadsheet->getActiveSheet()->getHighestRow()) as $row) {
            $this->spreadsheet->getActiveSheet()->getRowDimension($row)->setRowHeight(20, 'px');
        }
    }

    public function export(Practice $practice) {
        $this->generateSpreadsheet($practice);
    }
}
