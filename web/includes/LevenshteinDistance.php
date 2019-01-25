<?php
/**
 * Created by PhpStorm.
 * User: lucapalo
 * Date: 25.01.19
 * Time: 09:43
 */
/*
 *
If n = 0, return m and exit.
If m = 0, return n and exit.
Construct a matrix containing 0..m rows and 0..n columns.
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
    private $source_length; //n
    private $target_length; //m
    private $matrix;
    public function __construct( $source, $target ) {
        $this->source_length = strlen( $source );
        $this->target_length = strlen( $target );
        $this->matrix = array();
        $this->initMatrix();
    }
    public function initMatrix() {
        for ( $i=0; $i<$this->source_length; $i++) {
            $this->matrix[0][$i] = $i;
        }
        for ( $j=0; $j<$this->target_length; $j++ ) {
            $this->matrix[$j][0] = $j;
        }
    }

}