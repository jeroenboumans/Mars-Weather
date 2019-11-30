<?php


namespace App\Classes;

use Illuminate\Http\Request;

class StatsFilter
{
    private $request = null;

    public function __construct(Request $request)
    {
       $this->request = $request;
    }

    public function getRequestDate($offset = null)
    {
        $year   = $this->request->get('year') ?: date('Y');
        $month  = $this->request->get('month') ?: date('m');
        $day    = $this->request->get('day') ?: date('d');

        return date('Y-m-d', strtotime(implode('-', [$year, $month, $day]) . ' '. $offset));
    }

    public function getRequestRange()
    {
        return $this->request->get('range') ?: 'month';
    }

    public function getDateRange()
    {
        $startDate  = $this->getRequestDate();
        $endDate    = $this->getRequestDate("-1 " . $this->getRequestRange());

        return [$endDate, $startDate];
    }
}
