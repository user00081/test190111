<?php
/**
 * Created by PhpStorm.
 * User: lucapalo
 * Date: 25.01.19
 * Time: 09:43
 */
/*
If n = 0, return m and exit.
If m = 0, return n and exit.
1       Construct a matrix containing 0..m rows and 0..n columns.
2 	Initialize the first row to 0..n.
        Initialize the first column to 0..m.
3 	Examine each character of s (i from 1 to n).
4 	Examine each character of t (j from 1 to m).
5 	If s[i] equals t[j], the cost is 0.
        If s[i] doesn't equal t[j], the cost is 1.
6 	Set cell d[i,j] of the matrix equal to the minimum of:
     a. The cell immediately above plus 1: d[i-1,j] + 1.
     b. The cell immediately to the left plus 1: d[i,j-1] + 1.
     c. The cell diagonally above and to the left plus the cost: d[i-1,j-1] + cost.
7 	After the iteration steps (3, 4, 5, 6) are complete, the distance is found in cell d[n,m].
*/
class LevenshteinDistance
{
    private $source_string;
    private $target_string;
    private $source_length; //n
    private $target_length; //m
    private $matrix;

    public function __construct( $source, $target ) {
        $this->source_string = $source;
        $this->target_string = $target;
        $this->source_length = strlen( $source ); //n
        $this->target_length = strlen( $target ); //m
        $this->matrix = array();
        $this->getLevenshteinDistance();
    }
    
    public function getLevenshteinDistance() {
        if ( $this->source_length === 0 ) { // n === 0
            $difference = $this->target_length;
        } elseif ( $this->target_length === 0 ) { // m === 0
            $difference = $this->source_length;
        } else {
            $difference = $this->initMatrix();
        }
        return $difference;
    } 
    
    private function initMatrix() {
        $source_to = $this->source_length++;
        $target_to = $this->target_length++;
        for ( $i=0; $i<$source_to; $i++ ) {
            $this->matrix[0][$i] = $i;
        }
        for ( $j=1; $j<$target_to; $j++ ) {
            $this->matrix[$j][0] = $j;
        }
        var_dump( "init matrix looks like this:" );
        var_dump( $this->matrix );
        $this->fillMatrix();
        return $this->matrix[$i][$j];
    }
    
    private function fillMatrix() {
        for ( $i=1; $i<$this->source_length; $i++ ) {
            for ( $j=1; $j<$this->target_length; $j++ ) {
                $this->matrix[$i][$j] = $this->computeMinimum( $i, $j );
            }
        }
    }
    
    /*
     * array( cost, above current position, left of current position, above left of current position );
     * */
    private function computeInputParameters( $m, $n ) {
        return [
            $this->computeTop( $m, $n ),
            $this->computeLeft( $m, $n ),
            $this->computeDiag( $m, $n, $this->computeCost( $m, $n ) )
        ];
    }
    
    private function getCharsByMatrixPosition( $m, $n ) {
        return [ $this->source_string[$m], $this->target_string[$n] ];
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
    private function computeDiag( $m, $n, $cost ) {
        return ( $this->matrix[($m -1)][($n -1)] + $cost );
    }
    private function computeMinimum( $m, $n ) {
        $input_parameters = $this->computeInputParameters( $m, $n );
        return min( $input_parameters );
    }
}