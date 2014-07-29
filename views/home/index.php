<?php
  $settings = $this->get_settings();
  $entries = $model['entries'];
  $tags = $model['tags'];

  $prevUrl = NULL;
  $nextUrl = NULL;
  if(isset($this->tag)) {
    $prevUrl = $this->route_url(NULL, 'tag', array($this->tag, $this->page + 1));
    $nextUrl = $this->route_url(NULL, 'tag', array($this->tag, $this->page - 1));
  }
  else {
    $prevUrl = $this->route_url(NULL, 'home', $this->page + 1);
    $nextUrl = $this->route_url(NULL, 'home', $this->page - 1);
  }
?>
<div class="row">
  <div class="col-md-12"><h2>Posts</h2></div>

  <?php foreach($entries as $entry) { ?>
  <div class="col-md-4 col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <a href="#" class="pull-left"><?php echo $settings->display_name; ?></a> 
        <a href="#" class="pull-right"><?php echo $this->get_age_string($entry->created); ?></a>
      </div>
      <div class="panel-body">

        <a href="<?php echo $this->route_url(NULL, 'entry', $entry->id);?>" class="blacklink"><?php echo $entry->body; ?></a>

        <br>
        <div class="progress"><div class="progress-bar progress-bar-success" style="width: <?php echo rand(1,100);?>%"></div></div>

        <ul class="list-group">
          <li class="list-group-item">
            <?php foreach ($tags as $tag) { ?>
            <a href="<?php echo $this->route_url(NULL, 'tag', $tag); ?>"><span class="label label-warning"><?php echo $tag?></span></a>
            <?php } ?>          
          </li>

          <li class="list-group-item">
            <?php foreach ($tags as $tag) { ?>
            <img src="https://lh4.googleusercontent.com/-eSs1F2O7N1A/AAAAAAAAAAI/AAAAAAAAAAA/caHwQFv2RqI/s28-c-k-no/photo.jpg" width="28px" height="28px">
            <?php } ?>
          </li>

        </ul>

  
      </div>
    </div>
  </div>
  <?php } ?>

</div>

<div class="row">
  <br>
  <div class="clearfix"></div>
    <hr>
    <div class="col-md-12 text-center">
      <?php if (count($entries) == 25) { ?>
      <a href="<?php echo $prevUrl; ?>">Older Posts</a>
      <?php } if($this->page > 0) { ?>
      <a href="<?php echo $nextUrl; ?>">Newer Posts</a>
      <?php } ?>
    </div>
    <hr>
    <div class="col-md-12 text-center">
      <?php foreach ($tags as $tag) { ?>
      <a href="<?php echo $this->route_url(NULL, 'tag', $tag); ?>"><?php echo $tag?></a>
      <?php } ?>
    </div>
</div>


    <div class="row">
    <div class="col-md-4 col-sm-6">
      <div class="well"> 
      <form class="form-horizontal" role="form" method="post">
        <h4>Setup</h4>
        <?php
        $settings = $this->get_settings(FALSE);
        if($settings === NULL) {
        ?>
        <p>Congratulations! It appears the webserver is configured correctly to handle requests. We are almost done setting up and just need a few more details about your blog. Thank you for setting up aide as your blog engine.</p>
        <p class="error"><?php echo $model['error']; ?></p>
        <div class="form-group" style="padding:14px;">
        <label for="blog_name">Blog Name</label>
        <input class="form-control" placeholder="Blog Name" type="text" name="blog_name" required maxlength="63" value="<?php echo $model['blog_name']; ?>" />
        <label for="display_name">Your Name</label>
        <input class="form-control" placeholder="Your Name" type="text" name="display_name" required maxlength="63" value="<?php echo $model['display_name']; ?>" />
        <label for="email">Email</label>
        <input class="form-control" placeholder="Email" type="email" name="email" required maxlength="250" value="<?php echo $model['email']; ?>" />
        <label for="password">Password</label>
        <input class="form-control" placeholder="Password" type="password" name="password" required />
        </div>
        <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="submit" name="submit">Complete Setup</button></span>
        <?php } else { ?>
        <p>aide has already been set up. If you need to administer the site, please visit the login link below. If you need to setup the site again, you will need to delete the records in the <code>setting</code> database table to allow the setup to continue.</p>
        <?php } ?>
      </form>
      </div>
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>More Templates</h4></div>
      <div class="panel-body">
        <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Free @Bootply</a>
        <div class="clearfix"></div>
        There a load of new free Bootstrap 3 ready templates at Bootply. All of these templates are free and don't require extensive customization to the Bootstrap baseline.
        <hr>
        <ul class="list-unstyled"><li><a href="http://www.bootply.com/templates">Dashboard</a></li><li><a href="http://www.bootply.com/templates">Darkside</a></li><li><a href="http://www.bootply.com/templates">Greenfield</a></li></ul>
      </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="well"> 
      <form class="form">
        <h4>Sign-up</h4>
        <div class="input-group text-center">
        <input type="text" class="form-control input-lg" placeholder="Enter your email address">
        <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="button">OK</button></span>
        </div>
      </form>
      </div>
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootply Editor &amp; Code Library</h4></div>
      <div class="panel-body">
        <p><img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">The Bootstrap Playground</a></p>
        <div class="clearfix"></div>
        <hr>
        Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code repository.
      </div>
      </div>
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Portlet Heading</h4></div>
      <div class="panel-body">
        <ul class="list-group">
        <li class="list-group-item">Modals</li>
        <li class="list-group-item">Sliders / Carousel</li>
        <li class="list-group-item">Thumbnails</li>
        </ul>
      </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Portlet Heading</h4></div>
      <div class="panel-body">
        <ul class="list-group">
        <li class="list-group-item">Bootply Playground</li>
        <li class="list-group-item">Bootstrap Editor</li>
        <li class="list-group-item">Bootstrap Templates</li>
        </ul>
      </div>
      </div>
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Stackoverflow</h4></div>
      <div class="panel-body">
        <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
        <div class="clearfix"></div>
        <hr>
        <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good place to find answers.</p>
        <hr>
        <form>
        <div class="input-group">
          <div class="input-group-btn">
          <button class="btn btn-default">+1</button><button class="btn btn-default"><i class="glyphicon glyphicon-share"></i></button>
          </div>
          <input type="text" class="form-control" placeholder="Add a comment..">
        </div>
        </form>
      </div>
      </div>
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Top Items</h4></div>
      <div class="panel-body">
        <div class="list-group">
        <a href="http://bootply.com/tagged/bootstrap-3" class="list-group-item active">Bootstrap 3</a>
        <a href="http://bootply.com/tagged/snippets" class="list-group-item">Snippets</a>
        <a href="http://bootply.com/tagged/example" class="list-group-item">Examples</a>
        </div>
      </div>
      </div>
    </div>
    </div><!--/row-->
    <hr>
    <div class="row">
    <div class="col-md-12"><h2>Posts</h2></div>
    <div class="col-md-4 col-sm-6">
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Upgrade to Bootstrap 3</h4></div>
      <div class="panel-body">
        <img src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=70" class="img-circle pull-right"> <a href="#">Guidance and Tools</a>
        <div class="clearfix"></div>
        <hr>
        <p>Migrating from Bootstrap 2.x to 3 is not a simple matter of swapping out the JS and CSS files.
        Bootstrap 3 is a major overhaul, and there are a lot of changes from Bootstrap 2.x. <a href="http://bootply.com/bootstrap-3-migration-guide">This guidance</a> is intended to help 2.x developers transition to 3.
        </p>
        <h5><a href="http://google.com/+bootply">More on Upgrading from +Bootply</a></h5>

      </div>
      </div> 
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Profiles</h4></div>
      <div class="panel-body">
        Check out some of our member profiles..
        <hr>
        <div class="well well-sm">
        <div class="media">
          <a class="thumbnail pull-left" href="#">
          <img class="media-object" src="http://www.gravatar.com/avatar/a13ac7aed64918b6354f48da59490e3a?s=70">
          </a>
          <div class="media-body">
          <h4 class="media-heading">Jose Kinsella</h4>
          <p><span class="label label-info">10 photos</span> <span class="label label-primary">89 followers</span></p>
          <p>
            <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span> Message</a>
            <a href="#" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-heart"></span> Favorite</a>
          </p>
          </div>
        </div>
        </div>
      </div>
      </div> 
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Inspiration</h4></div>
      <div class="panel-body">
        <img src="//placehold.it/150" class="img-circle pull-right"> <a href="#">Articles</a>
        <div class="clearfix"></div>
        <hr>
        <div class="clearfix"></div>
        <img src="http://placehold.it/120x90/3333CC/FFF" class="img-responsive img-thumbnail pull-right">
        <p>The more powerful (and 100% fluid) Bootstrap 3 grid now comes in 4 sizes (or "breakpoints"). Tiny (for smartphones), Small (for tablets), Medium (for laptops) and Large (for laptops/desktops).</p>
        <div class="clearfix"></div>
        <hr>
        <div class="clearfix"></div>
        <img src="http://placehold.it/120x90/33CC33/FFF" class="img-responsive img-thumbnail pull-left" style="margin-right:5px;">
        <p>Mobile first" is a responsive Web design practice that prioritizes consideration of smart phones and mobile devices when creating Web pages.</p>
      </div>
      </div> 
    </div><!--/articles-->
    </div><!--/row-->
    <hr>
    <div class="row">
    <div class="col-sm-4 col-xs-6">
      <div class="panel panel-default">
      <div class="panel-thumbnail"><img src="//placehold.it/450/EDEDED" class="img-responsive" ></div>
      <div class="panel-body">
        <p class="lead">Hacker News</p>
        <p>120k Followers, 900 Posts</p>
        <p>
        <img src="https://lh4.googleusercontent.com/-eSs1F2O7N1A/AAAAAAAAAAI/AAAAAAAAAAA/caHwQFv2RqI/s28-c-k-no/photo.jpg" width="28px" height="28px">
        <img src="https://lh4.googleusercontent.com/-9Yw2jNffJlE/AAAAAAAAAAI/AAAAAAAAAAA/u3WcFXvK-g8/s28-c-k-no/photo.jpg" width="28px" height="28px">
        </p>
      </div>
      </div>
    </div><!--/col-->
    <div class="col-sm-4 col-xs-6">
      <div class="panel panel-default">
      <div class="panel-thumbnail"><img src="//placehold.it/450/DD66DD/FFF" class="img-responsive" ></div>
      <div class="panel-body">
        <p class="lead">Bootstrap Templates</p>
        <p>902 Followers, 88 Posts</p>
        <p>
        <img src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s28" width="28px" height="28px">
        <img src="https://lh5.googleusercontent.com/-AQznZjgfM3E/AAAAAAAAAAI/AAAAAAAAABA/WEPOnkQS_20/s28-c-k-no/photo.jpg" width="28px" height="28px">
        </p>
      </div>
      </div>
    </div><!--/col-->
    <div class="col-sm-4 col-xs-6">
      <div class="panel panel-default">
      <div class="panel-thumbnail"><img src="//placehold.it/450/2222CC/EEE" class="img-responsive" ></div>
      <div class="panel-body">
        <p class="lead">Social Media</p>
        <p>19k Followers, 789 Posts</p>
        <p>
        <img src="https://lh4.googleusercontent.com/-eSs1F2O7N1A/AAAAAAAAAAI/AAAAAAAAAAA/caHwQFv2RqI/s28-c-k-no/photo.jpg" width="28px" height="28px">
        <img src="https://lh4.googleusercontent.com/-9Yw2jNffJlE/AAAAAAAAAAI/AAAAAAAAAAA/u3WcFXvK-g8/s28-c-k-no/photo.jpg" width="28px" height="28px">
        </p>
      </div>
      </div>
    </div><!--/col-->
    </div><!--/row--> 
    <div class="row">
    <div class="col-md-12"><h2>Playground</h2></div>
    <div class="col-md-12">
      <div class="alert alert-info alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
      <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
      </div>
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Buttons &amp; Labels</h4></div>
      <div class="panel-body">
        <div class="row">
        <div class="col-xs-4"><a class="btn btn-default center-block" href="#">Button</a></div>
        <div class="col-xs-4"><a class="btn btn-primary center-block" href="#">Primary</a></div>
        <div class="col-xs-4"><a class="btn btn-danger center-block" href="#">Danger</a></div>
        </div>
        <br>
        <div class="row">
        <div class="col-xs-4"><a class="btn btn-warning center-block" href="#">Warning</a></div>
        <div class="col-xs-4"><a class="btn btn-info center-block" href="#">Info</a></div>
        <div class="col-xs-4"><a class="btn btn-success center-block" href="#">Success</a></div>
        </div>
        <hr>
        <div class="btn-group btn-group-sm"><button class="btn btn-default">1</button><button class="btn btn-default">2</button><button class="btn btn-default">3</button></div>        
        <hr>
        <div class="row">
        <div class="col-md-4">
          <span class="label label-default">Label</span>
          <span class="label label-success">Success</span>
        </div>
        <div class="col-md-4">
          <span class="label label-warning">Warning</span>  
          <span class="label label-info">Info</span>
        </div>
        <div class="col-md-4">
          <span class="label label-danger">Danger</span>
          <span class="label label-primary">Primary</span>
        </div>
        </div>
      </div>
      </div> 
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Progress Bars</h4></div>
      <div class="panel-body">
        <div class="progress">
        <div class="progress-bar progress-bar-info" style="width: 20%"></div>
        </div>
        <div class="progress">
        <div class="progress-bar progress-bar-success" style="width: 40%"></div>
        </div>
        <div class="progress">
        <div class="progress-bar progress-bar-warning" style="width: 80%"></div>
        </div>
        <div class="progress">
        <div class="progress-bar progress-bar-danger" style="width: 50%"></div>
        </div>
      </div>
      </div> 
    </div>
    <div class="col-md-6 col-sm-6">
      <div class="panel panel-default">
      <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Tabs</h4></div>
        <div class="panel-body">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#A" data-toggle="tab">Section 1</a></li>
          <li><a href="#B" data-toggle="tab">Section 2</a></li>
          <li><a href="#C" data-toggle="tab">Section 3</a></li>
        </ul>
        <div class="tabbable">
          <div class="tab-content">
          <div class="tab-pane active" id="A">
            <div class="well well-sm">I'm in Section A.</div>
          </div>
          <div class="tab-pane" id="B">
            <div class="well well-sm">Howdy, I'm in Section B.</div>
          </div>
          <div class="tab-pane" id="C">
            <div class="well well-sm">I've decided that I like wells.</div>
          </div>
          </div>
        </div> <!-- /tabbable -->
        <div class="col-sm-12 text-center">
          <ul class="pagination center-block" style="display:inline-block;">
          <li><a href="#"><i class="glyphicon glyphicon-chevron-left"></i></a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
          </ul>
        </div>
        </div>
      </div> 
    </div>
    <br>
    <div class="clearfix"></div>
    <hr>
      <div class="col-md-12 text-center"><p>
      Powered by <a href="https://github.com/aidewind/aide" target="_blank">aide</a> 
      | <a href="<?php echo $this->route_url(NULL, 'admin'); ?>">Admin</a>
      <?php if ($session !== NULL ) { ?>| <a href="<?php echo $this->route_url('logoff', 'admin'); ?>">Logoff</a><?php }?>
      </div>
    <hr>
    </div><!--row--> 
