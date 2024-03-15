<?php

namespace App\Exports\Admin;

use App\Services\FeatureService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FeatureExport implements FromQuery, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $request, $featureService;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->featureService = new FeatureService;
    }

    public function query()
    {
        $items = $this->featureService->downloadFeatureReport();
        $items = $this->featureService->search($this->request, $items);
        return $items;
    }

    public function headings(): array
    {
        return [
            'id',
            'Title',
            'Status',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B')->getFont()->setBold(true);
        $sheet->getStyle(1)->getFont()->setBold(true);
    }
}
