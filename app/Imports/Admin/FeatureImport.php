<?php

namespace App\Imports\Admin;

use App\Models\Feature;
use App\Services\HelperService;
use App\Services\ManagerLanguageService;
use App\Services\FeatureService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class FeatureImport implements ToCollection, WithStartRow
{
    protected $mls, $featureService, $helperService, $featureModel;

    public function __construct()
    {
        $this->mls = new ManagerLanguageService('flash');
        $this->featureService = new featureService();
        $this->helperService = new HelperService();
        $this->featureModel = new feature();
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $data = [];
        $i = 0;
        // dd($rows);
        foreach ($rows as $row) {
            // if ($row[0] == null) continue;
            // if ($row[1] == null) continue;
            // if ($row[2] == null) continue;
            // if ($row[3] == null) continue;
            // if ($row[4] == null) continue;
            /**
             *         'title','name','quantity', 'price','is_active', 'slug',
             */

            $data[$i]['title'] = $row[0];

            if (($row[1] == 'Active') || ($row[1] ==  'active') || ($row[1] ==  '1')) {
                $data[$i]['is_active'] = 1;
            } else {
                $data[$i]['is_active'] = 0;
            }
            $data[$i]['created_at'] = $this->helperService->getCurrentDateTime();
            $i++;
        }
        $features = $this->productService->insert($data);
    }
}
