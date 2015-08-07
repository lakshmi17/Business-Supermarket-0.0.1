<?php
/**
 * 
 * EGMapKMLIconStyle Class 
 * 
 * KML Icon Style tag object
 *
 * @author Antonio Ramirez Cobos
 * @link www.ramirezcobos.com
 *
 * 
 * @copyright 
 * 
 * Copyright (c) 2010 Antonio Ramirez Cobos
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software 
 * and associated documentation files (the "Software"), to deal in the Software without restriction, 
 * including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, 
 * and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, 
 * subject to the following conditions:
 * The above copyright notice and this permission notice shall be included in all copies or substantial 
 * portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT
 * LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN
 * NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, 
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE 
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 */
class EGMapKMLIconStyle extends EGMapKMLNode {
	/**
	 * 
	 * Style id
	 * @var string
	 */
	public $id;
	/**
	 * 
	 * Url of the image
	 * Must be an absolute URL
	 * @var string
	 */
	public $href;
	/**
	 * 
	 * Class constructor
	 * @param string $id style id
	 * @param string $iconId icon id
	 * @param string $href absolute URL of the image
	 */
	public function __construct($id, $iconId = null, $href = null){
		
		$this->tag = 'IconStyle';
		$this->id = $id;
		$this->tagId = $iconId;
		$this->href = $href;
	}
	/**
	 * (non-PHPdoc)
	 * @see EGMapKMLNode::toXML()
	 */
	public function toXML(){

		$icon = new EGMapKMLNode('Icon');
		if(!is_null($this->href))
			$icon->addChild( new EGMapKMLNode('href', $this->href ) );
		$this->addChild($icon);
		$result = CHtml::openTag( 'Style', array( 'id'=>$this->id ) );
		$result .= parent::toXML();
		$result .= CHtml::closeTag('Style');
		
		return $result;
	}
}