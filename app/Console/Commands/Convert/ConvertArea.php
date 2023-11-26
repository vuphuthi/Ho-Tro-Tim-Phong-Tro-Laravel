<?php

namespace App\Console\Commands\Convert;

use App\Models\Room;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class ConvertArea extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'convert:area';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \DB::table('rooms')->orderBy('id')->chunk(100, function (Collection $rooms) {
            foreach ($rooms as $item) {
                $room = Room::find($item->id);
                $this->info("=========== ROOM AREA: ". $room->area);
                $data['area'] = $room->area;
                $room->range_area = $this->switchArea($data)['range_area'];
                $room->save();
            }
        });
    }

    protected function switchArea($data)
    {
        switch ($data['area']) {
            case $data['area'] < 20:
                $data['range_area'] = 1;
                break;

            case ($data['area'] >= 20 && $data['area'] < 30):
                $data['range_area'] = 2;
                break;

            case ($data['area'] >= 30 && $data['area'] < 50):
                $data['range_area'] = 3;
                break;

            case ($data['area'] >= 50 && $data['area'] < 60):
                $data['range_area'] = 4;
                break;

            case ($data['area'] >= 60 && $data['area'] < 70):
                $data['range_area'] = 5;
                break;

            case ($data['area'] >= 70 && $data['area'] < 80):
                $data['range_area'] = 6;
                break;

            case ($data['area'] >= 80 && $data['area'] < 100):
                $data['range_area'] = 7;
                break;

            case ($data['area'] >= 100 && $data['area'] < 120):
                $data['range_area'] = 8;
                break;

            case ($data['area'] >= 120 && $data['area'] < 150):
                $data['range_area'] = 9;
                break;

            case ($data['area'] >= 150):
                $data['range_area'] = 10;
                break;
        }

        return $data;
    }
}
