<?php

namespace Geometrie;

interface IFigure
{
    public function CalculerAire();
    public function CalculerPerimetre():float;
    public function DessinerHtml();
    public function __toString();
}