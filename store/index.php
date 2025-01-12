<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,maximum-scale=10.0, minimal-ui" />
    <title>Hermosawave Photography: Hermosawave Photography Store</title>
        <!-- Typekit Asian Font Loader -->
<!-- 
font-family: ryo-gothic-plusn, sans-serif; (200, 400, 700)
-->
 <script>
  (function(d) {
    var config = {
      kitId: 'gwf6htn',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
      <link rel="stylesheet" href="/assets/css/styles.css">

      <link href='https://hermosawavephotography.com/feed.xml' rel='alternate' type='application/atom+xml'>
      
      <!-- Clicky Site analytics -->
      <script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101170903);</script>
      <script async src="//static.getclicky.com/js"></script>

      <!-- Favicon links -->
      <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
      <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
      <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
      <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
      <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
      <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
      <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
      <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
      <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
      <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
      <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
      <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
      <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
      <link rel="manifest" href="/manifest.json">
      <meta name="msapplication-TileColor" content="#ffffff">
      <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
      <meta name="theme-color" content="#ffffff">
      
      
      
  </head>
  <body>
      <div class="mainbody">
         
<nav>

    <div class="navitem">
    <a href="/" ><span class="hwp">hermosawave.photography</span></a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/latest/" >Latest Picture</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/about.html" >About</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/thumbnails/" >Thumbnails</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/categories/" >Locations</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/emptykyoto/" >Empty&nbsp;Kyoto</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/calendar/" >2025&nbsp;Calendar</a>&nbsp;&nbsp;
    </div>
  
</nav>

         
                <div class="topbody">
    <h1>Hermosawave Photography Print Store</h1>
    <p>Under Construction</p>

    <div id="frontpageleft">
            <p class="en">
                <img class="matted" src="<?php echo $_GET['image']; ?>" >
            </p>
            <h2><?php echo $_GET['title']; ?></h2>
      <p class="en">
                <?php 
                $_GET['date'];
               //  $formatteddate == $photodate("F j, Y, g:i a");  
                echo ($_GET['date'] . '  •  Picturecode: ' .  $_GET['picturecode']); ?>
             </p>
     </div>

 <div id="frontpageright">
     <p>Prints are made to order. It may take as long as 10 days for preparation. Please be patient.</p>
             <form id="printselect" method="get" action="checkout.php">
               <h3>Please select a size and format for your print:</h3>              
                
           <select name="printsize" id="printsize" class="printsize">
                <option value="">Please choose an option:</option>
                <option value="Small Print">Small Print - 127x178mm / 5"x7" (2L)</option>
                <option value="Small Framed Print">Small Framed Print  - 127x178mm / 5"x7" (2L)</option>
                <option value="Medium Print">Medium Print - 210x297mm / 8.5"x11" (A4, LTR)</option>
                <option value="Medium Pramed Print">Medium Framed Print - 210x297mm / 8.5"x11" (A4, LTR)</option>
                <option value="Large Print">Large Print - 330x483mm / 13"x19" (A3+, Super B)</option>
                <option value="Large Framed Print">Large Framed Print - 330x483mm / 13"x19" (A3+, Super B)</option>
           </select>
           <p>Prints have a ~20mm / 0.75" white border, and are signed on the border by the artist. </p>
   
                        <ul>Framed/Matted Finished Sizes (approximate):          
                            <li><strong>Small: </strong> 145x200mm / 5.75"x7.75" </li>
                          <li><strong>Medium: </strong> 330x410mm / 13"x16" </li>
                          <li><strong>Large: </strong> 490x640mm / 19"x25" </li>
                        </ul>



               <!-- carried over values -->
    
               <input type="hidden" id="product_id" name="product_id" value="<?php echo $_GET['picturecode']; ?>" />
               <input type="hidden" id="image_url" name="image_url" value="<?php echo 'https://hermosawavephotography.com' .  $_GET['image']; ?>" />
               <input type="hidden" id="description" name="description" value="<?php echo $_GET['date'] . ': ' . $_GET['title']; ?>" />                     
              
               <input class="printbutton" type="submit" value="Continue" />

        </form>
  </div> <!-- end frontpageright -->
       
</div>

  
        
        <footer>
    <div class="footer1">
        
<nav>

    <div class="navitem">
    <a href="/" ><span class="hwp">hermosawave.photography</span></a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/latest/" >Latest Picture</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/about.html" >About</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/thumbnails/" >Thumbnails</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/categories/" >Locations</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/emptykyoto/" >Empty&nbsp;Kyoto</a>&nbsp;&nbsp;
    </div>
  
    <div class="navitem">
    <a href="/calendar/" >2025&nbsp;Calendar</a>&nbsp;&nbsp;
    </div>
  
</nav>

    </div>
    <div class="footer2"> 
   <a href="/architecture">/architecture</a><br/>      
     <a href="https://blog.hermosawavephotography.com/" target="_blank">Newsletter</a><br/> 
    <a href="https://dashboard.mailerlite.com/forms/836089/125972582202607076/share">Picture of the Day Daily Email</a> <br/>
       <a href="/picturecode/">PictureCode</a><br/>            
        
      </div> 

    <div class="footer3">
        
       Photography and design by Daniel Sofer <br/>
       Photos generally taken the day of posting; <br/>check the exposure info underneath for exact time.<br/>
          &copy;2002-2025 Hermosawave Photography<br/> <br/>
 📬 <a href="mailto:photoweb@hermosawavephotography.com">        photos@hermosawavephotography.com</a><br/>
    Mastodon: <a rel="me" href="https://photog.social/@hermosawave">@photog.social/@hermosawave</a><br/>
        BlueSky: <a rel="me" href="https://bsky.app/profile/hermosawavephotography.com">@hermosawavephotography.com</a><br/>
      Glass: <a href="https://glass.photo/hermosawave" target="_blank">@hermosawave</a><br/> 
         Instagram: <a href="https://instagram.com/hermosawave.photography" target="_blank">@hermosawave.photography</a><br/>
      Threads: <a rel="me" href="https://www.threads.net/@hermosawave.photography">@hermosawave.photography</a><br/>
        Subscribe to my <a href="https://hermosawavephotography.com/feed.xml">RSS Feed</a><br/>
        <a href="/privacy/">Privacy Policy</a>   <br/>
                  
    </div>
</footer>
      </div>
  </body>
</html>
