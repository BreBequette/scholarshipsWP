<?php namespace jb\common;


if ( ! defined( 'ABSPATH' ) ) exit;


if ( ! class_exists( 'jb\common\CPT' ) ) {


	/**
	 * Class CPT
	 * @package jb\common
	 */
	class CPT {


		/**
		 * CPT constructor.
		 */
		function __construct() {
			add_action( 'init', [ &$this, 'create_post_types' ], 1 );
			add_action( 'init', [ &$this, 'register_post_statuses' ], 2 );

			add_action( 'admin_bar_menu', [ &$this, 'toolbar_links' ], 999, 1 );
			add_action( 'admin_bar_menu', [ &$this, 'new_cpt_links' ], 999, 1 );

			add_filter( 'request', [ &$this, 'change_feed_request' ], 10, 1 );
		}


		/**
		 * @param array $qv
		 *
		 * @return array
		 */
		function change_feed_request( $qv ) {
			if ( isset( $qv['feed'] ) && isset( $_GET['post_type'] ) && 'jb_job' == $_GET['post_type'] ) {
				$qv['post_type'] = 'jb-job';
			}

			return $qv;
		}


		/**
		 * Get all JB CPT
		 *
		 * @return array
		 *
		 * @since 1.0
		 */
		function get() {
			$cpt = [
				'jb-job' => [
					'labels'              => [
						'name'                  => __( 'Scholarships', 'jobboardwp' ),
						'singular_name'         => __( 'Scholarship', 'jobboardwp' ),
						'menu_name'             => _x( 'Scholarships', 'Admin menu name', 'jobboardwp' ),
						'add_new'               => __( 'Add New Scholarship', 'jobboardwp' ),
						'add_new_item'          => __( 'Add New Scholarship', 'jobboardwp' ),
						'edit'                  => __( 'Edit', 'jobboardwp' ),
						'edit_item'             => __( 'Edit Scholarship', 'jobboardwp' ),
						'new_item'              => __( 'New Scholarship', 'jobboardwp' ),
						'view'                  => __( 'View Scholarship', 'jobboardwp' ),
						'view_item'             => __( 'View Scholarship', 'jobboardwp' ),
						'search_items'          => __( 'Search Scholarships', 'jobboardwp' ),
						'not_found'             => __( 'No scholarships found', 'jobboardwp' ),
						'not_found_in_trash'    => __( 'No scholarships found in trash', 'jobboardwp' ),
						'parent'                => __( 'Parent Scholarship', 'jobboardwp' ),
						'featured_image'        => __( 'Company logo', 'jobboardwp' ),
						'set_featured_image'    => __( 'Set company logo', 'jobboardwp' ),
						'remove_featured_image' => __( 'Remove Company logo', 'jobboardwp' ),
						'use_featured_image'    => __( 'Use as Company logo', 'jobboardwp' ),
					],
					'description'         => __( 'This is where you can add new scholarships.', 'jobboardwp' ),
					'public'              => true,
					'show_ui'             => true,
					'capability_type'     => 'jb-job',
					'show_in_menu'        => false,
					'map_meta_cap'        => true,
					'capabilities'        => [ 'create_posts' => 'create_jb-jobs', ],
					'publicly_queryable'  => true,
					'exclude_from_search' => false,
					'hierarchical'        => false,
					'rewrite'             => [
						'slug'       => JB()->options()->get( 'job-slug' ),
						'with_front' => false,
						'feeds'      => true,
					],
					'query_var'           => true,
					'supports'            => [ 'title', 'editor', 'author', 'thumbnail', ],
					'has_archive'         => false,
					'show_in_nav_menus'   => false,
					'show_in_rest'        => true,
					'taxonomies'          => [ 'jb-job-type', 'jb-job-category', ],
				],
			];

			return apply_filters( 'jb_cpt_list', $cpt );
		}


		/**
		 * Get all CPT taxonomies
		 *
		 * @return array
		 *
		 * @since 1.0
		 */
		function get_taxonomies() {
			$jobs_slug = JB()->common()->permalinks()->get_slug( 'jobs' );

			$taxonomies = [
				'jb-job-type'   => [
					'post_types'    => [ 'jb-job' ],
					'tax_args'      => [
						'labels'                => [
							'name'                          => __( 'Scholarship Types', 'jobboardwp' ),
							'singular_name'                 => __( 'Scholarship Type', 'jobboardwp' ),
							'menu_name'                     => _x( 'Scholarship Types', 'Admin menu name', 'jobboardwp' ),
							'search_items'                  => __( 'Search Scholarship Types', 'jobboardwp' ),
							'all_items'                     => __( 'All Scholarship Types', 'jobboardwp' ),
							'edit_item'                     => __( 'Edit Scholarship Type', 'jobboardwp' ),
							'update_item'                   => __( 'Update Scholarship Type', 'jobboardwp' ),
							'add_new_item'                  => __( 'Add New Scholarship Type', 'jobboardwp' ),
							'new_item_name'                 => __( 'New Scholarship Type Name', 'jobboardwp' ),
							'popular_items'                 => __( 'Popular Scholarship Types', 'jobboardwp' ),
							'separate_items_with_commas'    => __( 'Separate Scholarship Types with commas', 'jobboardwp' ),
							'add_or_remove_items'           => __( 'Add or remove Scholarship Types', 'jobboardwp' ),
							'choose_from_most_used'         => __( 'Choose from the most used Scholarship Types', 'jobboardwp' ),
							'not_found'                     => __( 'No Scholarship Types found', 'jobboardwp' ),
							'parent_item'                   => __( 'Parent Type', 'jobboardwp' ),
							'parent_item_colon'             => __( 'Parent Type:', 'jobboardwp' ),
						],
						'hierarchical'          => true,
						'label'                 => __( 'Scholarship Types', 'jobboardwp' ),
						'show_ui'               => true,
						'show_in_menu'          => false,
						'query_var'             => true,
						'capabilities'          => [
							'manage_terms' => 'manage_jb-job-types',
							'edit_terms'   => 'edit_jb-job-types',
							'delete_terms' => 'delete_jb-job-types',
							'assign_terms' => 'edit_jb-job-types',
						],
						'rewrite'               => [
							'slug'       => _x( $jobs_slug . JB()->options()->get( 'job_type_slug' ), 'slug', 'jobboardwp' ),
							'with_front' => false,
						],
						'show_in_rest'      => true,
					],
				],
			];

			if ( JB()->options()->get( 'job-categories' ) ) {
				$taxonomies['jb-job-category'] = [
					'post_types'    => [ 'jb-job' ],
					'tax_args'      => [
						'labels'                => [
							'name'                          => __( 'Scholarship Categories', 'jobboardwp' ),
							'singular_name'                 => __( 'Scholarship Category', 'jobboardwp' ),
							'menu_name'                     => _x( 'Scholarship Categories', 'Admin menu name', 'jobboardwp' ),
							'search_items'                  => __( 'Search Scholarship Categories', 'jobboardwp' ),
							'all_items'                     => __( 'All Scholarship Categories', 'jobboardwp' ),
							'edit_item'                     => __( 'Edit Scholarship Category', 'jobboardwp' ),
							'update_item'                   => __( 'Update Scholarship Category', 'jobboardwp' ),
							'add_new_item'                  => __( 'Add New Scholarship Category', 'jobboardwp' ),
							'new_item_name'                 => __( 'New Scholarship Category Name', 'jobboardwp' ),
							'popular_items'                 => __( 'Popular Scholarship Categories', 'jobboardwp' ),
							'separate_items_with_commas'    => __( 'Separate Scholarship Categories with commas', 'jobboardwp' ),
							'add_or_remove_items'           => __( 'Add or remove Scholarship Categories', 'jobboardwp' ),
							'choose_from_most_used'         => __( 'Choose from the most used Scholarship Categories', 'jobboardwp' ),
							'not_found'                     => __( 'No Scholarship Categories found', 'jobboardwp' ),
							'parent_item'                   => __( 'Parent Category', 'jobboardwp' ),
							'parent_item_colon'             => __( 'Parent Category:', 'jobboardwp' ),
						],
						'hierarchical'          => true,
						'label'                 => __( 'Job Categories', 'jobboardwp' ),
						'show_ui'               => true,
						'show_in_menu'          => false,
						'query_var'             => true,
						'capabilities'          => [
							'manage_terms' => 'manage_jb-job-categories',
							'edit_terms'   => 'edit_jb-job-categories',
							'delete_terms' => 'delete_jb-job-categories',
							'assign_terms' => 'edit_jb-job-categories',
						],
						'rewrite'               => [
							'slug'       => _x( $jobs_slug . JB()->options()->get( 'job_category_slug' ), 'slug', 'jobboardwp' ),
							'with_front' => false,
						],
						'show_in_rest'      => true
					],
				];
			}

			return apply_filters( 'jb_taxonomies_list', $taxonomies );
		}


		/**
		 * Get all custom post statuses
		 *
		 * @return array
		 *
		 * @since 1.0
		 */
		function get_post_statuses() {
			$statuses = [
				'jb-expired'    => [
					'label'                     => _x( 'Expired', 'post status', 'jobboardwp' ),
					'public'                    => true,
					'protected'                 => true,
					'exclude_from_search'       => true,
					'show_in_admin_all_list'    => true,
					'show_in_admin_status_list' => true,
					// translators: %s: posts count
					'label_count'               => _n_noop( 'Expired <span class="count">(%s)</span>', 'Expired <span class="count">(%s)</span>', 'jobboardwp' ),
				],
				'jb-preview'    => [
					'label'                     => _x( 'Next', 'post status', 'jobboardwp' ),
					'public'                    => false,
					'exclude_from_search'       => true,
					'show_in_admin_all_list'    => false,
					'show_in_admin_status_list' => true,
					// translators: %s: posts count
					'label_count'               => _n_noop( 'Next <span class="count">(%s)</span>', 'Next <span class="count">(%s)</span>', 'jobboardwp' ),
				],
			];

			return apply_filters( 'jb_post_statuses', $statuses );
		}


		/**
		 * Create CPT & Taxonomies
		 *
		 * @since 1.0
		 */
		function create_post_types() {
			$cpt = $this->get();
			foreach ( $cpt as $post_type => $args ) {
				register_post_type( $post_type, $args );
			}

			$taxonomies = $this->get_taxonomies();
			foreach ( $taxonomies as $key => $taxonomy ) {
				register_taxonomy( $key, $taxonomy['post_types'], $taxonomy['tax_args'] );
			}
		}


		/**
		 * Register Job Board statuses
		 *
		 * @since 1.0
		 */
		function register_post_statuses() {
			$order_statuses = $this->get_post_statuses();

			foreach ( $order_statuses as $order_status => $values ) {
				register_post_status( $order_status, $values );
			}
		}


		/**
		 * Expand wp-admin bar links
		 *
		 * @param \WP_Admin_Bar $wp_admin_bar
		 *
		 * @since 1.0
		 */
		function toolbar_links( $wp_admin_bar ) {
			global $post;

			if ( ! is_user_logged_in() ) {
				return;
			}

			if ( ! is_singular( [ 'jb-job' ] ) ) {
				return;
			}

			if ( ! current_user_can( 'edit_post', $post->ID ) ) {
				return;
			}

			$args = [
				'id'    => 'jb_edit_job',
				'title' => '<span class="ab-icon"></span>' . __( 'Edit Job', 'jobboardwp' ),
				'href'  => get_edit_post_link(),
				'meta'  => [
					'class' => 'jb-child-toolbar',
				],
			];

			$wp_admin_bar->add_node( $args );
		}


		/**
		 * Expand wp-admin bar links
		 *
		 * @param \WP_Admin_Bar $wp_admin_bar
		 *
		 * @since 1.0
		 */
		function new_cpt_links( $wp_admin_bar ) {
			if ( ! is_user_logged_in() ) {
				return;
			}

			if ( ! current_user_can( 'create_jb-jobs' ) ) {
				return;
			}

			$wp_admin_bar->add_menu( [
				'parent'    => 'new-content',
				'id'        => 'new-jb-job',
				'title'     => __( 'Job', 'jobboardwp' ),
				'href'      => add_query_arg( [ 'post_type' => 'jb-job' ], admin_url( 'post-new.php' ) ),
			] );
		}
	}
}