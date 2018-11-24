<?php

namespace Service;


class SortArray {

	public function multiSortArr( $arr, $par1, $par2  ) {
		$sortArray1 = array();
		$sortArray2 = array();

		foreach ( $arr as $item ) {
			foreach ( $item as $key => $value ) {

				$sortArray1[ $key ][] = $value;
				$sortArray2[ $key ][] = $value;
			}
		}
		array_multisort(
			$sortArray1[ $par1 ], SORT_ASC
			, $sortArray2[ $par2 ], SORT_ASC, $arr
		);
		return $arr;

	}
}