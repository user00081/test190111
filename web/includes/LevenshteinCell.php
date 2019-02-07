<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LevenshteinCell
 *
 * @author lucapalo
 */
class LevenshteinCell {
    
    private $row;
    private $column;
    
    public function __construct() {
        
    }
    /*
     * array( cost, above current position, left of current position, above left of current position );
     * */
    private function computeInputParameters( $m, $n ) {
        return [
            $this->computeCost( $m, $n ),
            $this->computeTop( $m, $n ),
            $this->computeLeft( $m, $n ),
            $this->computeDiag( $m, $n, $this->param_of_differencies["cost"] )
        ];
    }
    
    private function getCharsByMatrixPosition( $m, $n ) {
        return [ $this->source_string[$n], $this->target_string[$m] ];
    }
    private function computeCost( $m, $n ) {
        $chars = $this->getCharsByMatrixPosition( $m, $n );
        return ( $chars[0] === $chars[1] )?0:1;
    }
    private function computeTop( $m, $n ) {
        return ( $this->matrix[ ($m - 1) ][ $n ] ) + 1;
    }
    private function computeLeft( $m, $n ) {
        return ( $this->matrix[ $m ][ ( $n -1 ) ] ) + 1;
    }
    private function computeDiag( $m, $n, $const ) {
        return ( $this->matrix[($m -1)][($n -1)] + $const );
    }
    private function computeMinimum( $m, $n ) {
        $input_parameters = $this->computeInputParameters( $m, $n );
        return min( $input_parameters );
    }
    //put your code here
}
