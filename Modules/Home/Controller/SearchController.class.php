<?php
/**
 * lionfish 商城系统
 *
 * ==========================================================================
 * @link      http://www.liofis.com/
 * @copyright Copyright (c) 2015 liofis.com. 
 * @license   http://www.liofis.com/license.html License
 * ==========================================================================
 *
 * @author    fish
 *
 */
namespace Home\Controller;

class SearchController extends CommonController {
	
    
    protected function _initialize()
    {
        parent::_initialize();
        $this->cur_page = 'search';
    }
    
    
	//进行中
	public function index(){
	    
	    $parent_list = M('goods_category')->where( array('pid' =>0, 'is_search' =>1) )->order('c_sort_order desc,sort_order desc')->select();
	    
	    foreach($parent_list as $key => $val)
	    {
	        $child_list = M('goods_category')->where( array('pid' => $val['id'], 'is_search' =>1) )->order('c_sort_order desc,sort_order desc')->select();
	        $val['child_list'] = $child_list;
	        $parent_list[$key] = $val;
	    }
	    $this->parent_list = $parent_list;
	    
		$this->display();	
	}	
	
	
	
}