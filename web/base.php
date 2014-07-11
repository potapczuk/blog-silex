<?php 
class Base {
    public static function getRecent(Silex\Application $app)
    {
        $sql = "SELECT * FROM post ORDER BY created DESC LIMIT 0,5";
        $posts = $app['db']->fetchAll($sql);
        
        return $posts;
    }
    
    public static function getArchive(Silex\Application $app)
    {
        $sql = "SELECT count(id) as c, year, month FROM post GROUP BY month, year ORDER BY year DESC, month DESC";
        $numbers = $app['db']->fetchAll($sql);
        
        $monthsWithPosts = array();
        foreach($numbers as $number){
            $monthsWithPosts[$number['year']][$number['month']] = $number['c'];
        }
        
        $year = date('Y');
        $month = date('n');
        
        for($i = 0; $i < 12; $i++){
            if(isset($monthsWithPosts[$year][$month])){
                $archive[$year][$month]['c'] = $monthsWithPosts[$year][$month];
            } else {
                $archive[$year][$month]['c'] = 0;
            }
            
            $archive[$year][$month]['name'] = self::getMonthName($month);
            
            if($month > 1){
                $month--;
            } else {
                $month = 12;
                $year--;
            }
        }
    
        return $archive;
    }
    
    public static function getMonthName($month){
        $dateObj = DateTime::createFromFormat('!m', $month);
        return $dateObj->format('F');
    }
    
    public static function getDefaultValues(Silex\Application $app)
    {
        $result = array();
        
        $result['sidebar_recent'] = self::getRecent($app);
        $result['sidebar_archive'] = self::getArchive($app);
        
        return $result;
    }
}