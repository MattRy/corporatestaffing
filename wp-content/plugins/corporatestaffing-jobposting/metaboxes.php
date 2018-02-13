<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 */
/**
 * Get the bootstrap!
 */

if ( file_exists( dirname( __FILE__ ) . '/metabox/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/metabox/init.php';
}


add_action( 'cmb2_init', __NAMESPACE__ . '\wsm_register_jobposting_metabox' );
function wsm_register_jobposting_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_corporatestaffing_jobposting_';

	/**
	 * Metabox to be displayed on a single page ID
	 */
	$cmb_jobposting = new_cmb2_box( array(
		'id'           => $prefix . 'metabox',
		'title'        => __( 'Job Posting Detail:', 'corporatestaffing-jobposting' ),
		'object_types' => array( 'job_posting' ),
		'context'      => 'normal',
		'priority'     => 'high',
		'show_names'   => true, 
		'taxonomies'	=> array('type'),
	) );

	// This field to b erepalced with Content / main post editor. 
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Description *', 'corporatestaffing-jobposting' ),
	// 	'desc'    => __( '(Schema Required)', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'description',
	// 	'type'    => 'wysiwyg',
	// 	'options' => array( 'textarea_rows' => 15, ),
	// 	'attributes' => array( 'required' => 'required', ),
	// ) );

	// This field to be included with Content / Description
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Education Requirements', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'education_requirements',
	// 	'type'    => 'wysiwyg',
	// 	'options' => array( 'textarea_rows' => 3, ),
	// ) );

	// This field to be included with Content / Description
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Experience Requirements', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'experience_requirements',
	// 	'type'    => 'wysiwyg',
	// 	'options' => array( 'textarea_rows' => 3, ),
	// ) );

	// This field to be included with Content / Description
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Responsibilities', 'corporatestaffing-jobposting' ),
	// 	'desc' => __( 'Job responsibilities associated with this role.', 'corporatestaffing-jobposting' ),		
	// 	'id'   => $prefix . 'responsibilities',
	// 	'type'    => 'wysiwyg',
	// 	'options' => array( 
	// 		'wpautop' => true, 
	// 		'textarea_rows' => 5, 
	// 	),
	// ) );

	// This field to be included with Content / Description
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Terms of Service', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'tos',
	// 	'type'    => 'wysiwyg',
	// 	'options' => array( 'textarea_rows' => 5, ),
	// ) );

	// This field to be included with Content / Description
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'How To Apply', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'howtoapply',
	// 	'type'    => 'wysiwyg',
	// 	'options' => array( 'textarea_rows' => 5, ),
	// ) );

	$cmb_jobposting->add_field( array(
		'name' => __( 'Date Posted', 'corporatestaffing-jobposting' ),
		'id'   => $prefix . 'date_posted',
		'type' => 'text_date',
		'attributes' => array( 'required' => 'required', ),
	) );

	$cmb_jobposting->add_field( array(
		'name' => __( 'Job Title', 'corporatestaffing-jobposting' ),
		'desc' => __( 'The Job Title is different from the Job Post Title above. This is the title of the position being described.', 'corporatestaffing-jobposting' ),		
		'id'   => $prefix . 'job_title',
		'type' => 'text',
		'attributes' => array( 'required' => 'required', ),
	) );
	// This has become a taxonomy to support archive pages 
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Hiring Organization', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'hiring_organization',
	// 	'type' => 'text',
	// 	'taxonomy'       => 'tags', 
	// 	'attributes' => array( 'required' => 'required', ),
	// ) );

	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Employment Type', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'employment_type',
	// 	// 'type' => 'taxonomy_radio_inline',
	// 	'taxonomy'       => 'employment_type', 
	// 	'type'           => 'taxonomy_select',
	// 	'remove_default' => 'true',
	// 	// 'options' => array(
	// 	// 	'FULL_TIME'   => __( 'Full Time', 'corporatestaffing-jobposting' ),
	// 	// 	'PART_TIME'   => __( 'Part Time', 'corporatestaffing-jobposting' ),
	// 	// 	'CONTRACTOR'     => __( 'Contract', 'corporatestaffing-jobposting' ),
	// 	// 	'TEMPORARY'     => __( 'Temporary', 'corporatestaffing-jobposting' ),
	// 	// 	'VOLUNTEER'     => __( 'Volunteer', 'corporatestaffing-jobposting' ),
	// 	// 	'INTERN'     => __( 'Intern', 'corporatestaffing-jobposting' ),
	// 	// 	'PER_DIEM'     => __( 'Per Diem', 'corporatestaffing-jobposting' ),
	// 	// 	'OTHER'     => __( 'Other', 'corporatestaffing-jobposting' ),
	// 	// ),
	// 	'attributes' => array( 'required' => 'required', ),
	// ) );

	$cmb_jobposting->add_field( array(
		'name' => __( 'Job Location-Locality', 'corporatestaffing-jobposting' ),
		'desc' => __('Town/City', 'corporatestaffing-jobposting' ),
		'id'   => $prefix . 'job_location_locality',
		'type' => 'select',
		'show_option_none' => true,
		'options' => array(
			'Nairobi' => __( 'Nairobi', 'corporatestaffing-jobposting' ),
			'Mombasa' => __( 'Mombasa', 'corporatestaffing-jobposting' ),
			'Kisumu' => __( 'Kisumu', 'corporatestaffing-jobposting' ),
			'Eldoret' => __( 'Eldoret', 'corporatestaffing-jobposting' ),
			'Nyeri' => __( 'Nyeri', 'corporatestaffing-jobposting' ),
			'Thika' => __( 'Thika', 'corporatestaffing-jobposting' ),
			'Nakuru' => __( 'Nakuru', 'corporatestaffing-jobposting' ),
		),
		'attributes' => array( 'required' => 'required', ),
	) );

	$cmb_jobposting->add_field( array(
		'name' => __( 'Job Location-Region', 'corporatestaffing-jobposting' ),
		'desc' => __('Country', 'corporatestaffing-jobposting' ),
		'id'   => $prefix . 'job_location_region',
		'type' => 'select',
		'show_option_none' => true,
		'options' => array(
			'Kenya' => __( 'Kenya', 'corporatestaffing-jobposting' ),
			'Uganda' => __( 'Uganda', 'corporatestaffing-jobposting' ),
			'Tanzania' => __( 'Tanzania', 'corporatestaffing-jobposting' ),
		),
		'attributes' => array( 'required' => 'required', ),
	) );

	$cmb_jobposting->add_field( array(
		'name' => __( 'Valid Through', 'corporatestaffing-jobposting' ),
		'id'   => $prefix . 'valid_through',
		'type' => 'text_date',
		'attributes' => array( 'required' => 'required', ),
	) );
		
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Base Salary', 'corporatestaffing-jobposting' ),
	// 	'desc' => __('<br>No currency symbol needed.', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'base_salary',
	// 	'type' => 'text_small',
	// ) );
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Salary Currency', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'salary_currency',
	// 	'type'    => 'radio_inline',
	// 	'options' => array(
	// 		'USD' => __( 'USD', 'corporatestaffing-jobposting' ),
	// 		'KES' => __( 'KES', 'corporatestaffing-jobposting' ),
	// 		'EUR' => __( 'EUR', 'corporatestaffing-jobposting' ),
	// 	),
	// ) );
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Base Salary Units', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'base_salary_units',
	// 	'type' => 'radio_inline',
	// 	'options' => array(
	// 		'YEAR'   => __( 'YEAR', 'corporatestaffing-jobposting' ),
	// 		'MONTH'  => __( 'MONTH', 'corporatestaffing-jobposting' ),
	// 		'WEEK'   => __( 'WEEK', 'corporatestaffing-jobposting' ),			
	// 		'HOUR'   => __( 'HOUR', 'corporatestaffing-jobposting' ),		
	// 	),
	// ) );

	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Estimated Salary', 'corporatestaffing-jobposting' ),
	// 	'desc' => __('<br>No currency symbol needed.', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'estimated_salary',
	// 	'type' => 'text_small',
	// ) );

	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Incentive Compensation', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'incentive_compensation',
	// 	'type' => 'text',
	// ) );
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Industry', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'industry',
	// 	'type' => 'text',
	// ) );
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Job Benefits', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'job_benefits',
	// 	'type' => 'textarea',
	// ) );

	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Job Location-PostalCode', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'job_location_postal_code',
	// 	'type' => 'text',
	// ) );
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Job Location-Street Address', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'job_location_street_address',
	// 	'type' => 'text',
	// ) );
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Occupational Category', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'occupational_category',
	// 	'type' => 'select',
	// 	'show_option_none' => true,
	// 	'options' => array(
	// 		'Accounting' => __( 'Accounting', 'corporatestaffing-jobposting' ),
	// 		'Auditing' => __( 'Auditing', 'corporatestaffing-jobposting' ),
	// 		'Agriculture' => __( 'Agriculture', 'corporatestaffing-jobposting' ),
	// 		'Airline' => __( 'Airline', 'corporatestaffing-jobposting' ),
	// 		'Administration' => __( 'Administration', 'corporatestaffing-jobposting' ),
	// 		'Banking' => __( 'Banking', 'corporatestaffing-jobposting' ),
	// 		'Customer Service' => __( 'Customer Service', 'corporatestaffing-jobposting' ),
	// 		'Communication' => __( 'Communication', 'corporatestaffing-jobposting' ),
	// 		'Government' => __( 'Government', 'corporatestaffing-jobposting' ),
	// 		'Credit Control' => __( 'Credit Control', 'corporatestaffing-jobposting' ),
	// 		'Driving' => __( 'Driving', 'corporatestaffing-jobposting' ),
	// 		'Engineering' => __( 'Engineering', 'corporatestaffing-jobposting' ),
	// 		'Graduate' => __( 'Graduate', 'corporatestaffing-jobposting' ),
	// 		'Graphics Designer' => __( 'Graphics Designer', 'corporatestaffing-jobposting' ),
	// 		'Hotel' => __( 'Hotel', 'corporatestaffing-jobposting' ),
	// 		'Human Resource' => __( 'Human Resource', 'corporatestaffing-jobposting' ),
	// 		'IT' => __( 'IT', 'corporatestaffing-jobposting' ),
	// 		'Internships' => __( 'Internships', 'corporatestaffing-jobposting' ),
	// 		'Insurance' => __( 'Insurance', 'corporatestaffing-jobposting' ),
	// 		'Legal' => __( 'Legal', 'corporatestaffing-jobposting' ),
	// 		'Logistics' => __( 'Logistics', 'corporatestaffing-jobposting' ),
	// 		'Management Trainee' => __( 'Management Trainee', 'corporatestaffing-jobposting' ),
	// 		'Media' => __( 'Media', 'corporatestaffing-jobposting' ),
	// 		'Medical' => __( 'Medical', 'corporatestaffing-jobposting' ),
	// 		'Nutritionist' => __( 'Nutritionist', 'corporatestaffing-jobposting' ),
	// 		'NGO' => __( 'NGO', 'corporatestaffing-jobposting' ),
	// 		'Procurement' => __( 'Procurement', 'corporatestaffing-jobposting' ),
	// 		'Public Relations' => __( 'Public Relations', 'corporatestaffing-jobposting' ),
	// 		'Quantity Surveyor' => __( 'Quantity Surveyor', 'corporatestaffing-jobposting' ),
	// 		'Quality Assurance' => __( 'Quality Assurance', 'corporatestaffing-jobposting' ),
	// 		'Sales & Marketing' => __( 'Sales & Marketing', 'corporatestaffing-jobposting' ),
	// 		'Social Work' => __( 'Social Work', 'corporatestaffing-jobposting' ),
	// 		'Scholarships' => __( 'Scholarships', 'corporatestaffing-jobposting' ),
	// 		'Security' => __( 'Security', 'corporatestaffing-jobposting' ),
	// 		'Teaching' => __( 'Teaching', 'corporatestaffing-jobposting' ),
	// 		'Tours & Travel' => __( 'Tours & Travel', 'corporatestaffing-jobposting' ),
	// 		'Nursing' => __( 'Nursing', 'corporatestaffing-jobposting' ),
	// 		'Warehouse & Stores' => __( 'Warehouse & Stores', 'corporatestaffing-jobposting' ),
	// 		'UN' => __( 'UN', 'corporatestaffing-jobposting' ),
	// 		'University' => __( 'University', 'corporatestaffing-jobposting' ),
	// 	),
	// ) );
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Qualifications', 'corporatestaffing-jobposting' ),
	// 	'desc' => __( 'Qualifications needed for this role.', 'corporatestaffing-jobposting' ),				
	// 	'id'   => $prefix . 'qualifications',
	// 	'type' => 'textarea',
	// ) );


	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Skills', 'corporatestaffing-jobposting' ),
	// 	'desc' => __( 'Skills required to fulfill this role.', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'skills',
	// 	'type' => 'textarea',
	// ) );
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Special Commitments', 'corporatestaffing-jobposting' ),
	// 	'desc' => __( 'Any special commitments associated with this job posting. Valid entries include VeteranCommit, MilitarySpouseCommit, etc.', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'special_commitments',
	// 	'type' => 'text',
	// ) );

// Use post title in place of this extra field. 
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Title', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'title',
	// 	'type' => 'text',
	// ) );
	
	// $cmb_jobposting->add_field( array(
	// 	'name' => __( 'Work Hours', 'corporatestaffing-jobposting' ),
	// 	'desc' => __( 'The typical working hours for this job (e.g. 1st shift, night shift, 8am-5pm).', 'corporatestaffing-jobposting' ),
	// 	'id'   => $prefix . 'work_hours',
	// 	'type' => 'text',
	// ) );
}