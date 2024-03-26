<?php

namespace App\Exports\Admin;

use App\Services\FaqService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FaqExport implements FromQuery, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $request, $faqService;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->faqService = new FaqService;
    }

    public function query()
    {
        $items = $this->faqService->downloadFaqReport();
        $items = $this->faqService->search($this->request, $items);
        return $items;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Question',
            'Answer',
            'Status',
            'Created Date',
            'Updated Date'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B')->getFont()->setBold(true);
        $sheet->getStyle(1)->getFont()->setBold(true);
    }
}
