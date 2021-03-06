This plugin was altered from JobBoardWP to work as a scholarship posting board. Below is the original README for JobBoardWP.

=======================================================

=== JobBoardWP - Job Board Listings and Submissions ===
Author URI: https://jobboardwp.com/
Plugin URI: https://wordpress.org/plugins/jobboardwp/
Contributors: ultimatemember, nsinelnikov
Tags: job, job board, job portal, job listing, job manager
Requires PHP: 5.6
Requires at least: 5.0
Tested up to: 5.7
Stable tag: 1.0.5
License: GNU Version 2 or Any Later Version
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

Add a modern job board to your website. Display job listings and allow employers to submit and manage jobs all from the front-end.

== Description ==

JobBoardWP is an easy to use and lightweight plugin that enables you to add job board functionality to your website. With a clean, modern UI, job seekers can view and search for jobs, whilst employers can submit jobs to your job board and manage their jobs from the jobs dashboard.

= FRONT-END FEATURES: =

The plugin adds three pages to the front-end of your website:

= Jobs page =

The jobs page displays a list of jobs with keyword and location search. Job seekers can also filter jobs to show only remote jobs or certain job types/categories.

= Post Job page =

The post job page is where users can submit a job via the job submission form. You can choose for jobs to appear automatically on the jobs page or require admin approval. The form enables users to add personal, job and company details. Users can save their form as a draft and preview the job before submitting the job.

= Jobs Dashboard page =

The jobs dashboard page is where users manage their submitted jobs. The shortcode on the page outputs a list of jobs a user has submitted. The user can see the status of their jobs, when they expire and manage their jobs. Actions users can take on their job dashboard include: deleting jobs, editing jobs, continuing job submission, marking a job as filled and re-submitting a job.

= ADMIN FEATURES: =

The plugin makes it easy for you to manage your job board from the wp-admin.

= Jobs =

As the admin you can see a list of all jobs and filter by status (published, pending, expired etc). You can view, edit and approve jobs from the wp-admin jobs list.

= Add New =

You can also create your own new jobs directly from the wp-admin.

= Job Types =

Job types allow users to select the type of job they are listing when they submit a job. The plugin comes with 7 built in job types (Freelance, Full-time, Graduate, Internship, Part-time, Temporary, Voulnteer) and each tag is assigned a default tag color (tag colors can be changed easily). You can delete, add and edit the job types.

= Job Categories =

You can create custom categories for jobs in the wp-admin and allow users to select a category for their job submission when submitting a job.

= Settings =

The plugin provides various settings so you can customize how your job board looks and functions. You can also enable/disable emails and change email text.

= GOOGLE STRUCTURED DATA: =

The plugin has been built to work with Google search by adding structured data to job listings. This allows job listings to appear in Google job search results.

= Documentation & Support =

Got a problem or need help with JobBoardWP? Head over to our [documentation](http://docs.jobboardwp.com/) and perform a search of the knowledge base. If you can’t find a solution to your issue then you can create a topic on the [support forum](https://wordpress.org/support/plugin/jobboardwp/).

== Frequently Asked Questions ==

= Where can I find JobBoardWP documentation and user guides? =

For help setting up and configuring JobBoardWP please refer to our [documentation](http://docs.jobboardwp.com/)

= Where can I get support or talk to other users? =

If you get stuck, you can ask for help in the [JobBoardWP Support Forum](https://wordpress.org/support/plugin/jobboardwp).

= Will JobBoardWP work with my theme? =

Yes! JobBoardWP will work with any theme, but may require some styling or making [custom templates](https://docs.jobboardwp.com/article/1570-templates-structure).

= Will JobBoardWP work with WordPress Multisite installation? =

Yes! JobBoardWP is WordPress Multisite compatible.

== Installation ==

1. Activate the plugin
2. That's it. Go to Job Board > Settings to customize plugin options
3. For more details, please visit the official [Documentation](http://docs.jobboardwp.com/) page.

== Screenshots ==

1. Screenshot 1
2. Screenshot 2
3. Screenshot 3
4. Screenshot 4
5. Screenshot 5
6. Screenshot 6
7. Screenshot 7
8. Screenshot 8
9. Screenshot 9
10. Screenshot 10

== Changelog ==

= 1.0.5: May 4, 2021 =

* Added: 'jb-job-company-data' hook for 3rd-party integrations to company data array
* Fixed: job type dropdown pre-defined value

= 1.0.4: March 10, 2021 =

* Added: Ability to get jobs feed
* Fixed: Jobs list pagination via shortcode attribute `per-page="{number}"`
* Fixed: `preview` to `jb-preview` argument in $_GET attribute to avoid the conflicts
* Fixed: Expiration date saving with localized date

= 1.0.3: December 23, 2020 =

* Fixed: Job description formatting
* Fixed: The issue with posting job from Guest
* Fixed: Displaying jobs list with hidden filled jobs
* Tweak: Removed tipsy.js as unused

= 1.0.2: November 3, 2020 =

* Added: Job Category attribute for the jobs shortcode
* Added: Job Type attribute for the jobs shortcode
* Fixed: Multisite support (Job logos)
* Fixed: Custom Job template parsing
* Fixed: Location field JS
* Fixed: Empty "Expired Date" data issues
* Fixed: "Sign In" typo and wp-login redirect on click
* Fixed: WP-Admin settings structure
* Tweak: Updated conditional logic for wp-admin settings (made the dependency from more than 1 field)

= 1.0.1: August 12, 2020 =

* Added: Hooks for the integration with [Ultimate Member](https://wordpress.org/plugins/ultimate-member) and [Ultimate Member - JobBoardWP integration](https://wordpress.org/plugins/um-jobboardwp) plugins

= 1.0.0: July 21, 2020 =

* Initial Release