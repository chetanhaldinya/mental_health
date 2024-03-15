<?php

namespace App\Exports\Admin;

use App\Services\BannerService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BannerExport implements FromQuery, WithHeadings, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    use Exportable;

    protected $request, $bannerService;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->bannerService = new BannerService;
    }

    public function query()
    {
        $items = $this->bannerService->downloadBannerReport();
        $items = $this->bannerService->search($this->request, $items);
        return $items;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Heading',
            'Is_Active',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B')->getFont()->setBold(true);
        $sheet->getStyle(1)->getFont()->setBold(true);
    }
}
