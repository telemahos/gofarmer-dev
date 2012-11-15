<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//------------------------------------------------------------------------
// User Meta Fields Config - These are just examples of various options
// The following examples show how to use regular inputs, select boxes,
// state and country select boxes.
//-----------------------------------------------------------------------

$config['gf_user_meta_fields'] =  array(
	array(
		'name'   => 'street_name',
		'label'   => lang('user_meta_street_name'),
		'rules'   => 'trim|max_length[100]|xss_clean',
		'frontend' => TRUE,
		'form_detail' => array(
			'type' => 'input',
			'settings' => array(
				'name'		=> 'street_name',
				'id'		=> 'street_name',
				'maxlength'	=> '100',
				'class'		=> 'span6',
//				'required'	=> TRUE,
			),
		),
	),


	array(
		'name'   => 'state',
		'label'   => lang('user_meta_state'),
		'rules'   => 'required|trim|max_length[2]|xss_clean',
		'form_detail' => array(
			'type' => 'state_select',
			'settings' => array(
				'name'		=> 'state',
				'id'		=> 'state',
				'maxlength'	=> '2',
				'class'		=> 'span1'
			),
		),
	),

	array(
		'name'   => 'country',
		'label'   => lang('user_meta_country'),
		'rules'   => 'required|trim|max_length[100]|xss_clean',
		'admin_only' => FALSE,
		'form_detail' => array(
			'type' => 'country_select',
			'settings' => array(
				'name'		=> 'country',
				'id'		=> 'country',
				'maxlength'	=> '100',
				'class'		=> 'span6'
			),
		),
	),

	array(
		'name'   => 'type',
		'label'   => lang('user_meta_type'),
		'rules'   => 'required|xss_clean',
		'frontend' => TRUE,
		'admin_only' => FALSE,
		'form_detail' => array(
			'type' => 'dropdown',
			'settings' => array(
				'name'		=> 'type',
				'id'		=> 'type',
				'class'		=> 'span6',
			),
			'options' =>  array(
                  'small'  => 'Small Shirt2',
                  'med'    => 'Medium Shirt2',
                  'large'   => 'Large Shirt2',
                  'xlarge' => 'Extra Large Shirt2',
                ),
		),
	),
);