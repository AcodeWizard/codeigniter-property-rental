<html>
  <head>
<?php /**/ ?><meta name="viewport" content="width=device-width, initial-scale=1"><?php /**/ ?>
<?php /** / ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"/>
<?php /** / ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<?php /**/ ?>
<?php
get_instance()->includeLocalJS('jquery-3.2.1.min.js');
get_instance()->includeLocalJS('jquery-ui.min.js');
get_instance()->includeLocalJS('jquery.dataTables.min.js');
get_instance()->includeLocalJS('bootstrap.min.js');
get_instance()->includeLocalJS('nickolas_solutions.js');
?>
<script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>
<link rel="stylesheet" href="<?php echo NS_BASE_URL; ?>css/jquery-ui.min.css"/>
<link rel="stylesheet" href="<?php echo NS_BASE_URL; ?>css/jquery.dataTables.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<script src="js/bootstrap.min.js"></script>
<style type="text/css">
<?php include(APPPATH.'../css/bootstrap.min.css'); ?>  
</style>

<style type="text/css">

<?php include(APPPATH.'../css/main.css'); ?>
#NS_Rental > .items .list > div { display:none; <?php /** / ?>height:400px;<?php /**/ ?> }
#NS_Rental > .items .list > div.active { display:block; border:none;}
<?php /** / ?>
#NS_Rental > .items .list > div .image {height:80px;overflow:none;}
#NS_Rental > .items .list > div .image img {height:80px;}
<?php /**/ ?>
//#NS_Rental > .items .list > div .image p {display:none;}

//#NS_Rental > .items .list > div .caption { overflow:hidden;}
#NS_Rental > .items .list > div .caption .title { overflow:hidden;height:50px;}
#NS_Rental > .items .tags ul li { display:none; }
#NS_Rental > .items .tags li.shown
,#NS_Rental > .items .tags li.active { display:inline-block; }
#NS_Rental > .items .tags li.active { border: 1px solid #000000; background-color:#FEEFB3; }

#NS_Rental .action > div {display:none;}
#NS_Rental .action.period > div.period
,#NS_Rental .action.checking > div.checking
,#NS_Rental .action.booked > div.booked
,#NS_Rental .action.add > div.available
,#NS_Rental .action.update > div.available { display:block; }
#NS_Rental .action > div.available span { display:none; }
#NS_Rental .action.add > div.available span.add
,#NS_Rental .action.update > div.available span.update { display:inline-block; }

#NS_Rental .booking .bookingActions a.depositPayment {
  display:none;
}

#NS_Rental > .header .quotes .closed
,#NS_Rental > .header .bookings .previous { color:#D0D0D0; }

#NS_Rental > .header .quotes .active
,#NS_Rental > .header .bookings .active { color:#b2dba1; }

#NS_Rental .items .thumbnail .image > .overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100%;
  width: 100%;
  opacity: 0;
  transition: .5s ease;
  background-color: #008CBA;
  
  color: white;
  top: 50%;
  left: 50%;
  font-size:12px;
  
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
  text-valign: middle;
}
#NS_Rental .items .thumbnail .image:hover > .overlay {
  opacity: 1;
}

#NS_Rental .items .thumbnail .image > .overlay p {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

</style>
</head><body>
<?php require_once(APPPATH.'views/alert.php'); ?>
<?php require_once(VIEWPATH.'frontend/base_js.php'); ?>
<div id="NS_Rental">
  <div class="header clearfix" style="margin-bottom: 20px;">
    <div  class="clearfix">
      <div class="pull-left">
      </div>
      <div class="pull-right">
          <li style="position: relative; content-align:center">
            <div style="margin-left: -10%">
              <h3 style="color:#eb5634;">Important! Please Complete Here</h3>
              <h5 style="color:#ffffff;">Hi Thanks for Stopping By! Please Add Your Hire Date Here</h5>
              <div class="periodLabel">
                <span onclick="NS_Rental.period.show();"><?php echo $this->lang->phrase('choose_period');?></span>
              </div>
            </div>
          </li>
          <li><span class="items" onclick="NS_Rental.items.init();"><?php echo $this->lang->phrase('items'); ?></span></li>
          <li><span class="cart" onclick="NS_Rental.cart.init();"><?php echo $this->lang->phrase('cart'); ?></span></li>
          <li><span class="login hidden" onclick="NS_Rental.user.prepareLogin();">Login</span></li>
          <li>          
            <span class="authorized quotes hidden">Quotes: 
              <span class="active" title="active" onclick="NS_Rental.quote.loadList('active');">0</span> / 
              <span class="previous" title="previous" onclick="NS_Rental.quote.loadList('previous');">0</span>
            </span>
          </li>
          <li>          
            <span class="authorized bookings hidden">Bookings: 
              <span class="active" title="active" onclick="NS_Rental.booking.loadList('active');">0</span> / 
              <span class="previous" title="previous" onclick="NS_Rental.booking.loadList('previous');">0</span>
            </span>
          </li>
          <li><span class="authorized profile hidden" onclick="NS_Rental.user.profile();"></span></li>
          <li><span class="authorized logout hidden" onclick="NS_Rental.user.logout();">Logout</span></li>
      </div>
    </div>
    <?php require_once(VIEWPATH.'frontend/period.php'); ?>
  </div>
  <?php //require_once(__DIR__.'/test_modal.php'); ?>
  <?php require_once(VIEWPATH.'frontend/user.php'); ?>
  <div class="body items hidden" data-section="items" style="padding: 0% 10% 10% 5%">
    <div class="row">
      <div class="col-sm-3 col-xs-4 leftPanel">
        <div class="mb-4">
          <?php require_once(__DIR__.'/search.php'); ?>
        </div>
        <div class="card panel panel-default categories mb-4">
          <div class="card-header panel-heading">Categories</div>
          <ul class="panel-body list-group list-group-flush my-0">
            
          </ul>
        </div>
        <div class="card panel panel-default tags mb-4">
          <div class="card-header panel-heading">Tags</div>
          <ul class="panel-body list-unstyled my-0"></ul>
        </div>
      </div>
      <div class="col-sm-9 col-xs-8">
        <p class="category"><span class="title">Items</span> <span class="back hidden" onclick="NS_Rental.items.updateCategory(0);">(Show All)</span></p>
        <div class="list clearfix"></div>
        <div class="pagination clearfix"></div>
      </div>
    </div>
    
  </div>
  <div class="body item hidden row" data-section="item">
    <div class="col-xs-offset-1 col-xs-10">
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="row">
          <div class="gallery col-md-5 col-sm-6 col-sx-12">
            <div class="chosen"><img class="img-responsive"/></div>
            <div class="list"></div>
          </div>
          <div class="col-md-7 col-sm-6 col-xs-12">
            <div class="title"></div>
            <div class="categories"></div>
            <div class="tags"><ul></ul></div>
            <div class="description"></div>
            <div class="embed"></div>
            <div class="action">
              <div class="available">
                <input type="text" class="form-control quantity" value="" placeholder=""/>
                <a class="btn btn-primary" onclick="NS_Rental.cart.add();"><span class="add">ADD_TO_CART</span> <span class="update">UPDATE_CART</span></a>
              </div>
              <div class="booked"><span>ALL_BOOKED</span></div>
              <div class="checking"><span>CHECKING_AVAILABILITY</span></div>
              <div class="period"><span onclick="NS_Rental.period.show();">DEFINE_PERIOD</span></div>
            </div>
          </div>
          
          <div class="col-sm-12 rawInput">
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  <?php require_once(__DIR__.'/cart.php'); ?>
  <?php require_once(VIEWPATH.'frontend/booking.php'); ?>
  <?php require_once(VIEWPATH.'frontend/quote/base.php'); ?>
  <div class="templates hidden">
    <div class="cartItem">
      <div class="row item_X_">
        <div class="col-sm-3 col-lg-1 col-xl-1">
          _THUMBNAIL_
        </div>
        <div class="col-sm-4 col-lg-6 col-xl-6">
          <div>_TITLE_</div>
          <div>_PACKED_</div>
        </div>
        <div class="col-sm-2">
          <input class="form-control quantity" type="text" name="quantity[_X_]" onchange="NS_Rental.cart.update(_X_);" placeholder="_PLACEHOLDER_"/>
        </div>
        <div class="col-sm-2">
          <div class="price"></div>
        </div>
        <div class="col-sm-1"><i class="glyphicon glyphicon-trash" onclick="NS_Rental.cart.remove(_X_);">&nbsp;&nbsp;&nbsp;</i></div>
      </div>
    </div>
    <?php //include(APPPATH.'/views/booking/view.php'); ?>
  </div>
</div>
<script type="text/javascript">
NS_Rental.user.loadHeader();
NS_Rental.init();
</script>
<?php /** / echo '<pre>'; print_r($_SESSION); echo '</pre>'; ?>
<?php echo '<pre>'; print_r($this->reply); echo '</pre>'; /**/ ?>
</body></html>