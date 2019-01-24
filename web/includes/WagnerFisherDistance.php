<?php
/**
 * Created by PhpStorm.
 * User: lucapalo
 * Date: 24.01.19
 * Time: 16:55
 */

class WagnerFisherDistance
{
    public function __construct( $string1, $string2 )
    {
        for ( $i=0; $i<strlen( $string1 ); $i++ ) {

            for ( $j=0; $j<strlen( $string2 ); $i++ ) {

            }
        }
        /*
        int EditDistance(char s[1..m], char t[1..n])
   // For all i and j, d[i,j] will hold the Levenshtein distance between
   // the first i characters of s and the first j characters of t.
   // Note that d has (m+1) x (n+1) values.
   let d be a 2-d array of int with dimensions [0..m, 0..n]

   for i in [0..m]
       d[i, 0] ← i // the distance of any first string to an empty second string
                 // (transforming the string of the first i characters of s into
                 // the empty string requires i deletions)
   for j in [0..n]
       d[0, j] ← j // the distance of any second string to an empty first string

   for j in [1..n]
   for i in [1..m]
   if s[i] = t[j] then
         d[i, j] ← d[i-1, j-1]        // no operation required
       else
         d[i, j] ← minimum of
    (
        d[i-1, j] + 1,  // a deletion
                      d[i, j-1] + 1,  // an insertion
                      d[i-1, j-1] + 1 // a substitution
                    )

   return d[m,n]
*/

    }

}