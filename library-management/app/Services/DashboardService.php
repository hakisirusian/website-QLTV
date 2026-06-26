<?php
namespace app\Services; use app\Repositories\DashboardRepository;
class DashboardService{ private DashboardRepository $repo; public function __construct(){ $this->repo=new DashboardRepository(); } public function data(string $date=''):array{ return ['statistics'=>$this->repo->statistics($date),'recent_borrows'=>$this->repo->recentBorrows($date),'low_stock_items'=>$this->repo->lowStockItems()]; }}
