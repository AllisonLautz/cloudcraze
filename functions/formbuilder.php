<?php

/*
	Form building functions
	==========================================
		1) Form Type Defintions
		2) Form HTML builder
		3) Validation Functinos
		4) Compiler Functions
		5) Sample & Test
	------------------------------------------
	==========================================
*/

/*
	==========================================
	------------------------------------------
	1) Form Type Defintions
	------------------------------------------
*/

	function defineField($data){
		return true;
	}

/*
	==========================================
	------------------------------------------
	2) Form HTML builder
	------------------------------------------
*/

	function formField($data){
		/*
			data array options (*required)
			$data = array(
				'type'        => * string,    field type: text|password|email|radio|checkbox|submit|select|textarea
				'name'        => * string,    field name: 'name'
				'value'       =>   string,    default value
				'required'    =>   interger,  is field required: 0|1
				'limit'       =>   interger,  field character limit
				'label' 	  => * string,    Label text,
				'placeholder' =>   string,    placeholder text,
				'options'     =>   array,     array(1 => array('value','label','selected'),1 => array('value','label',1))
				'class'       =>   interger,  custom class for div
				'group'		  =>   interger,  true|false must be set to true for checkbox or radio groups else false
			);
		*/


		// set defaults for non existant values
		if(!isset($data['value'])) $data['value'] = '';
		if(!isset($data['limit'])) $data['limit'] = false;
		if(!isset($data['placeholder'])) $data['placeholder'] = '';
		if(!isset($data['options'])) $data['options'] = false;
		if(!isset($data['group'])) $data['group'] = false;
		if(!isset($data['class'])) $data['class'] = '';

		if(!isset($data['after'])) {
			$data['after'] = false;
			if($data['type'] == 'checkbox' || $data['type'] == 'radio'){
				$data['after'] = true;
			}
		}


		if($data['group'] == true){
			$group = '<div class="groupwrap">';
			$i = 1;
			foreach ($data['options'] as $key => $value) {
				$group .= '<input type="'.$data['type'].'" id="'.$i.'_'.$data['name'].'" name="'.$data['name'].'" value="'.$value[0].'"><label for="'.$i.'_'.$data['name'].'">'.$value[1].'</label>';
				$i++;
			}
			$group .= "</div>";
		}elseif($data['options'] != false){
			$options = '';
			foreach ($data['options'] as $key => $value) {
				$selected = "";
				if($value[2] === true)$selected = 'selected';
				$options .= '<option value="'.$value[0].'" '.$selected.'>'.$value[1].'</option>';
			}
		}
		$max = "";
		if($data['limit'] != false) $max = 'maxlenght='.$data['limit'];

		$field = "field type not found";

		switch ($data['type']) {
			case 'text': $field = '<input type="text" name="'.$data['name'].'" value="'.$data['value'].'" placeholder="'.$data['placeholder'].'" '.$max.'>'; break;
			case 'password': $field = '<input type="password" name="'.$data['name'].'" value="'.$data['value'].'" placeholder="'.$data['placeholder'].'" '.$max.'>'; break;
			case 'email': $field = '<input type="email" name="'.$data['name'].'" value="'.$data['value'].'" placeholder="'.$data['placeholder'].'" '.$max.'>'; break;
			case 'radio': $field = $group; break;
			case 'checkbox': $field = $group; break;
			case 'submit': $field = '<input type="submit" name="'.$data['name'].'" value="'.$data['value'].'">'; break;
			case 'select': $field = '<select name="'.$data['name'].'">'.$options.'</select>'; break;
			case 'textarea': $field = '<textarea name="" '.$max.'></textarea>'; break;
		}

		$required = '';
		if($data['required'] === true) $required = '*';
		$label = '<label for="'.$data['name'].'">'.$data['label'].'</label>';
		$html .= '<div class="fieldwrap '.$data['class'].' field_'.$data['name'].' type_'.$data['type'].' >';
		$html .= $label.$field;
		$html .= '</div>';

		return $html;

	}

/*
	==========================================
	------------------------------------------
	3) Form Validation functions
	------------------------------------------
*/

	function validateField($data){
		return true;
	}


/*
	==========================================
	------------------------------------------
	4) Compiler Functions
	------------------------------------------

*/
	//loop to build fields
	function buildFields($data){
		$fields = "";
		foreach ($data as $field) { $fields .= formField($field); }
		return $fields;
	}

	function createForm($data){
		/*
			data array sample

			$data = array(
				'action' => string
				'method' => get|post
				'name' => string
				'class' => string
				'fields' => array
			);
		*/
		if(!isset($data['method'])) $data['method'] = '';
		if(!isset($data['action'])) $data['action'] = '';
		if(!isset($data['name'])) $data['name'] = '';
		if(!isset($data['class'])) $data['class'] = '';

		$html = "";
		if($data['wrap'] ) $html .= '<form class="'.$data['class'].'" name="'.$data['name'].'" action="'.$data['action'].'" method="'.$data['method'].'">';
		$html .= buildFields($data['fields']);
		if($data['wrap'] ) $html .= '</form> <!-- end form '.$data['class'].'->';

		return $html;
	}

/*
	==========================================
	------------------------------------------
	5) Test Functions & Samples
	------------------------------------------

*/


	$form = array(
		'wrap' => true;
		'action' => '',
		'method' => 'post',
		'name' => 'natetest',
		'class' => 'testclass',
		'fields' => array(
			 array(
				'type'        => 'text',
				'name'        => 'first_name',
				'value'       => '',
				'required'    => 1,
				// 'limit'    => false,
				'label'       => 'First Name',
				'placeholder' => 'John',
				// 'options'  => '',
				'class'       => 'first-name',
			),

			 array(
				'type'        => 'text',
				'name'        => 'last_name',
				'value'       => '',
				'required'    => 1,
				// 'limit'    => false,
				'label'       => 'Last Name',
				'placeholder' => 'Doe',
				// 'options'  => '',
				'class'       => 'last-name',
			),

			 array(
				'type'        => 'email',
				'name'        => 'email',
				'value'       => '',
				'required'    => 1,
				// 'limit'    => false,
				'label'       => 'Email Address',
				'placeholder' => 'email@domain.com',
				// 'options'  => '',
				'class'       => 'last-name',
			),

			 array(
				'type'        => 'checkbox',
				'name'        => 'colors',
				'value'       => '',
				'required'    => 1,
				// 'limit'    => false,
				'label'       => 'Colors',
				// 'placeholder' => '',
				'options'     => array('red','green','blue'),
				'class'       => 'last-name',
			),
			 array(
				'type'        => 'radio',
				'name'        => 'gender',
				'value'       => '',
				'required'    => 1,
				// 'limit'    => false,
				'label'       => 'Gender',
				// 'placeholder' => '',
				'group'		  => true,
				'options'     => array(
					array('male','Male',false),
					array('female','Female',false),
					array('null','unKnown',true),
					),
				'class'       => 'last-name',
			),

			 array(
				'type'        => 'checkbox',
				'name'        => 'prefence',
				'value'       => '',
				'required'    => 1,
				// 'limit'    => false,
				'label'       => 'Prefence',
				// 'placeholder' => '',
				'group'		  => true,
				'options'     => array(
					array('coke','Coke',false),
					array('diet','Diet Coke',false),
					array('dr','Dr Pepper',false),
					array('rootbeer','Root Beer',true)
					),
				'class'       => 'last-name',
			),

			 array(
				'type'           => 'textarea',
				'name'           => 'comments',
				'value'          => '',
				'required'       => 1,
				// 'limit'       => false,
				'label'       => 'Comments',
				// 'placeholder' => '',
				// 'options'     => '',
				'class'          => 'comments',
			),
			 array(
				'type'        => 'submit',
				'name'        => 'submit',
				'value'       => 'Submit Form',
				'required'    => 1,
				// 'limit'    => false,
				// 'label'       => 'Last Name',
				// 'placeholder' => 'Doe',
				// 'options'  => '',
				'class'       => 'submit',
			),
		),
	);

	// echo createForm($form);