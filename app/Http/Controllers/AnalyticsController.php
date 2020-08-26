<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $general_stats = $this->getGeneralStats();
        $engagement_stats = $this->getEngagement();
        $weekly_results = $this->getWeeklyResults();
        $monthly_results = $this->getMonthlyResults();
        $causes_stress = $this->getCausesStress();
        $population_risks = $this->getPopulationRisks();
        $coaching_reports = $this->getCoachingReports();
        $reasons_sessions = $this->getReasonSessions();

        return view("dashboard.analytics.index", [
            "general_stats" => $general_stats,
            "engagement_stats" => $engagement_stats,
            "weekly_results" => $weekly_results,
            "monthly_results" => $monthly_results,
            "causes_stress" => $causes_stress,
            "population_risks" => $population_risks,
            "coaching_reports" => $coaching_reports,
            "reasons_sessions" => $reasons_sessions,
        ]);
    }

    // BEGIN General Tab
    public function getGeneralStats()
    {
        $general_stats = [
            [
                "label" => "Total Registered Accounts",
                "value" => DB::table('users')->count(),
            ],
            [
                "label" => "Online Users",
                "value" => DB::table('vieva_current_users')->count(),
            ],
            [
                "label" => "Free Accouts",
                "value" => DB::table('users')->where("user_level", 4)->count(),
            ],
            [
                "label" => "Premium Accounts",
                "value" => DB::table('users')->where("user_level", 3)->count(),
            ],
            [
                "label" => "Corporate Accounts",
                "value" => DB::table('users')->where("user_level", 2)->count(),
            ],
            [
                "label" => "French Language",
                "value" => DB::table('users')->where("selected_language", 0)->count(),
            ],
            [
                "label" => "English Language",
                "value" => DB::table('users')->where("selected_language", 1)->count(),
            ],
            [
                "label" => "Accounts Created Mobile",
                "value" => DB::table('users')->where("created_on", 0)->count(),
            ],
            [
                "label" => "Accounts Created Web",
                "value" => DB::table('users')->where("created_on", 1)->count(),
            ],
            [
                "label" => "Weekly Checks Submitted",
                "value" => DB::table('vieva_all_checks')->where("checks_type", 0)->count(),
            ],
            [
                "label" => "Monthly Checks Submitted",
                "value" => DB::table('vieva_all_checks')->where("checks_type", 1)->count(),
            ],
        ];

        return $general_stats;
    }

    public function getEngagement()
    {
        $engagement_stats = [
            [
                "label" => "Video Views",
                "value" => DB::table('vieva_user_activities_videos')->count(),
            ],
            [
                "label" => "Video Likes	",
                "value" => DB::table('vieva_video_likes')->where("likes", "!=", 0)->count(),
            ],
            [
                "label" => "Video Comments",
                "value" => DB::table('vieva_video_comments')->count(),
            ],
            [
                "label" => "Challenges Accepted",
                "value" => DB::table('vieva_challenges')->count(),
            ],
            [
                "label" => "Quote Likes",
                "value" => DB::table('vieva_quotes')->count(),
            ],
        ];

        return $engagement_stats;
    }

    public function getWeeklyResults()
    {
        $weekly_results = [
            [
                "label" => "Overall Average",
                "value" => DB::table('vieva_all_checks')->count(),
            ],
            [
                "label" => "Workload Average",
                "value" => DB::table('vieva_all_checks')->count(),
            ],
            [
                "label" => "Stress Average",
                "value" => DB::table('vieva_all_checks')->count(),
            ],
            [
                "label" => "Energy Average",
                "value" => DB::table('vieva_week_progress')->count(),
            ],
        ];

        return $weekly_results;
    }

    public function getMonthlyResults()
    {
        $monthly_results = [
            [
                "label" => "Well-being Score Average",
                "value" => DB::table('vieva_week_progress')->count(),
            ],
            [
                "label" => "Average Mood",
                "value" => DB::table('vieva_week_progress')->count(),
            ],
            [
                "label" => "Average Energy",
                "value" => DB::table('vieva_week_progress')->count(),
            ],
            [
                "label" => "Average Engagement",
                "value" => DB::table('vieva_week_progress')->count(),
            ],
        ];

        return $monthly_results;
    }

    public function getCausesStress()
    {
        $results = [
            [
                "label" => "Current Project Not Engaging",
                "value" => "",
            ],
            [
                "label" => "Over Loaded With Work",
                "value" => "",
            ],
            [
                "label" => "Frustated With Colleagues",
                "value" => "",
            ],
            [
                "label" => "Lacking Support To Do The Job",
                "value" => "",
            ],
            [
                "label" => "Family Issues",
                "value" => "",
            ],
            [
                "label" => "Unclear Expectations",
                "value" => "",
            ],
        ];

        return $results;
    }

    public function getPopulationRisks()
    {
        $results = [
            ["label" => "High Risk", "value" => ""],
            ["label" => "Moderate Risk", "value" => ""],
            ["label" => "Low Risk", "value" => ""],
        ];

        return $results;
    }

    public function getCoachingReports()
    {
        $results = [
            ["label" => "Coaching Sessions", "value" => ""],
            ["label" => "Average Coachrating", "value" => ""],
            ["label" => "Returning Users", "value" => ""],
        ];

        return $results;
    }

    public function getReasonSessions()
    {
        $results = [
            ["label" => "Depression", "value" => ""],
            ["label" => "Parenting Issues", "value" => ""],
            ["label" => "Relationship Issues", "value" => ""],
            ["label" => "Mourning", "value" => ""],
            ["label" => "Conflicts", "value" => ""],
            ["label" => "Self-confidence", "value" => ""],
            ["label" => "Addictions", "value" => ""],
            ["label" => "Others", "value" => ""],
        ];

        return $results;
    }

    // END General Tab

}
