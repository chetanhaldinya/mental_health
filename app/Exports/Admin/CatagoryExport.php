<?php

namespace App\Exports\Admin;

use App\Services\CatagoryService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CatagoryExport implements FromQuery, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $request, $catagoryService;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->catagoryService = new CatagoryService;
    }

    public function query()
    {
        $items = $this->catagoryService->downloadCatagoryReport();
        $items = $this->catagoryService->search($this->request, $items);
        return $items;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Title',
            'Description',
            'Status',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B')->getFont()->setBold(true);
        $sheet->getStyle(1)->getFont()->setBold(true);
    }
}
