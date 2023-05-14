<?php

namespace App\Services;

use App\Constants;
use CpChart\Chart\Pie;
use CpChart\Data;
use CpChart\Image;

class Charts
{
    /**draw Line chart
     *
     * @param $nameOfYaxis
     * @param array $dataOfY
     * @param array $dataOfX
     * @throws \Exception
     */
    public static function renderLineChart($nameOfYaxis, array $dataOfY, array $dataOfX)
    {
        $data = new Data();
        $data->setAxisName(0, $nameOfYaxis);
        $data->addPoints($dataOfY, "Probe 3");
        $data->addPoints($dataOfX, "Labels");
        $data->setAbscissa("Labels");

        $image = new Image(2000, 1000, $data);
        $image->setGraphArea(60, 60, 700, 700);
        $image->drawScale(["DrawSubTicks" => true]);
        $image->setShadow(true, ["X" => 1, "Y" => 1, "R" => 0, "G" => 0, "B" => 0, "Alpha" => 10]);
        $image->drawLineChart(["DisplayValues" => true, "DisplayColor" => DISPLAY_AUTO]);
        $image->autoOutput("example.drawLineChart.png");
    }


    /**draw pie chart
     *
     * @param array $arrValues
     * @param array $namesOfSectors
     */
    public static function renderPieChart(array $arrValues, array $namesOfSectors)
    {
        $data = new Data();
        $data->addPoints($arrValues, "ScoreA");
        $data->addPoints($namesOfSectors, "Labels");
        $data->setAbscissa("Labels");
        $image = new Image(1000, 500, $data, true);
        $pieChart = new Pie($image, $data);
        $pieChart->setSliceColor(2, ["R" => 143, "G" => 197, "B" => 0]);
        $image->setShadow(true, ["X" => 3, "Y" => 3, "R" => 0, "G" => 0, "B" => 0, "Alpha" => 10]);
        $pieChart->draw3DPie(500, 300, ["WriteValues" => true, "DataGapAngle" => 10, "DataGapRadius" => 6, "Border" => true]);
        $pieChart->drawPieLegend(450, 200, ["Style" => LEGEND_BOX, "Mode" => LEGEND_HORIZONTAL]);
        $image->autoOutput("example.draw3DPie.png");
    }


}
