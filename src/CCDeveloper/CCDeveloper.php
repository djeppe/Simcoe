<?php
/**
 * Controller for development and testing purpose, helpful methods for the developer.
 * 
 * @package SimcoeCore
 */
class CCDeveloper implements IController {
    /**
     * Implementing interface IController. All controllers must have an index action.
     */
    public function Index() {
        $this->Menu();
    }
    
    /**
     * Create a list of links in the supported ways.
     */
    public function Links() {
        $this->Menu();
        
        $sim = CSimcoe::GetInstance();
        
        $url = 'developer/links';
        $current = $sim->request->CreateUrl($url);
        
        $sim->request->cleanUrl = false;
        $sim->request->querystringUrl = false;
        $default = $sim->request->CreateUrl($url);
        
        $sim->request->cleanUrl = true;
        $clean = $sim->request->CreateUrl($url);
        
        $sim->request->cleanUrl = false;
        $sim->request->querystringUrl = true;
        $querystring = $sim->request->CreateUrl($url);
        
        $sim->data['main'] .= <<<EOD
<h2>CRequest::CreateUrl())</h2>
<p>Here is a list of urls created using above methods with various settings. All links should lead to this same page.</p>
<ul>
<li><a href='$current'>This is the current setting</a>
<li><a href='$default'>This would be the default url</a>
<li><a href='$clean'>This should be a clean url</a>
<li><a href='$querystring'>This should be a querystring like url</a>
</ul>
<p>Enables various and flexible url-strategy.</p>
EOD;
    }
    
    /**
     * Create a method that shows the mennu, same for all methods.
     */
    private function Menu() {
        $sim = CSimcoe::GetInstance();
        $menu = array('developer', 'developer/index', 'developer/links');
        
        $html = null;
        foreach($menu as $val) {
            $html .= "<li><a href='" . $sim->request->CreateUrl($val) . "'>$val</a>";
        }
        
        $sim->data['title'] = "The Developer Controller";
        $sim->data['main'] = <<<EOD
<h1>The Developer Controller</h1>
<p>This is what you can do for now:</p>
<ul>
$html
</ul>
EOD;
    }
}
?>