<?php use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <!-- modal form -->
    <div class="modal fade "  id="modal-1" >

                            <div class="modal-dialog ">
                                <div class="modal-content">

                                    <div class="modal-body" style="height:400px">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>


                                        <div class="row-fluid">
                                            <ul class="breadcrumb">
                                                <li class="completed"><span>Contact Details</span></li>
                                                <li><span>Product Information</span></li>
                                                <li><span>Finalize</span></li>
                                            </ul>
                                        </div>
                                        <hr class="hr-primary">

                                        <form class="contact-detail">
                                            <div class=" form-line">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user green"></i></span>
                                                        <input type="text" name="InputName" placeholder="Enter Name" class="form-control" autofocus="autofocus" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope green"></i></span>
                                                        <input type="email" name="InputEmail" placeholder="Enter Email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone green"></i></span>
                                                        <input type="email" name="InputCno" placeholder="Phone : (+91)" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker green "></i></span>
                                                        <textarea class="form-control" rows="4" id="description" placeholder="Enter Address"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>

                                    <button class="btinqr btn-block text-center" data-dismiss="modal" data-target="#modal-2" data-toggle="modal">NEXT</button>

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-2">

                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body">

                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        <div class="row-fluid">
                                            <ul class="breadcrumb">
                                                <li><span>Contact Details</span></li>
                                                <li class="completed"><span>Product Information</span></li>
                                                <li><span>Finalize</span></li>
                                            </ul>
                                        </div>
                                        <hr class="hr-primary">
                                        <form class="product-info">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-xs-5">
                                                        <label for="quantity">Quantity</label>
                                                        <input type="text" id="quantity" class="form-control" name="quantity">
                                                    </div>

                                                    <div class="col-xs-5">
                                                        <label for="unit">Select Unit</label>
                                                        <select id="units" class="form-control" name="unit">
                                                                <option value="0" disabled selected>Select from below</option>
                                                        <option value="Kilograms">Kilograms</option>
                                                        <option value="Nos">Nos</option>
                                                        <option value="Pieces">Pieces</option>
                                                        <option value="Tons">Tons</option>
                                                        <option value="Unit">Unit</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group" style="padding-top: 2%">
                                                <label class="m-t-10">Approximate Order Value</label>
                                                <select id="value" class="form-control" name="value">
                                                        <option value="0" disabled selected>Select from below</option>
                                    <option value="1k">Upto 1,000</option>
                                    <option value="1k to 3k">1,000 to 3,000</option>
                                    <option value="3k to 10k">3,000 to 10,000</option>
                                    <option value="10k to 20k">10,000 to 20,000</option>
                                    <option value="20k to 50k">20,000 to 50,000</option>
                                    <option value="50k to 100k">50,000 to 1 Lakh</option>
                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="usage" class="m-t-10">Usage/Application</label>
                                                <input type="text" id="usage" class="form-control" name="usage">
                                            </div>
                                            <div class="form-group">
                                                <label for="other" class="m-t-10">Other Requirements</label>
                                                <textarea name="InputMessage" rows="6" class="form-control" type="text" placeholder="Provide any specific details about :'Product/Service required', 'Quality', 'Standard', 'Size' etc... "></textarea>
                                            </div>
                                        </form>
                                    </div>

                                    <button class="btinqr btn-block text-center" data-dismiss="modal" data-target="#modal-3" data-toggle="modal">NEXT</button>

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-3">

                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <div class="row-fluid">
                                            <ul class="breadcrumb">
                                                <li><span>Contact Details</span></li>
                                                <li><span>Product Information</span></li>
                                                <li class="completed"><span>Finalize</span></li>
                                            </ul>
                                        </div>
                                        <hr class="hr-primary">
                                    </div>
                                    <div>
                                        <button class="btinqr btn-block text-center" data-dismiss="modal"><span >DONE</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal form end -->
    <!-- Second navbar for search -->

    <!-- /.navbar -->
    <div class="rest-body container" >
        <div class="catalog">
            <nav class="navbar navbar-default navbar-static">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
		        </button>
                    <h2>PRODUCT CATALOGS</h2>
                </div>
                <div class="collapse navbar-collapse js-navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown dropdown-large">
                            <a href="#" class=" btn  btn-outlined dropdown-toggle " data-toggle="dropdown">Search by Catagories <b class="caret"></b></a>

                            <ul class="dropdown-menu dropdown-menu-large row">
                            <?php foreach ($categorys as $category): ?>
                                <li class="col-sm-4">
                                    <ul>
                                        <li class="dropdown-header">  <?= $category->name?></li>
                                        <?php foreach ($category->ps as $products): ?>
                                        <li><a href="#"><?= $products->name ?></a></li>
                                        <?php endforeach; ?>
                                        <li class="divider"></li>

                                    </ul>
                                </li>
                            <?php endforeach; ?>

                            </ul>

                        </li>
                    </ul>

                </div>
                <!-- /.nav-collapse -->
            </nav>



        </div>

        <div class="container">

            <?php foreach ($product as $products): ?>
            <div id='<?= $products->pid ?>' class="col-xs-12 col-sm-4 zoom col-centered">
                    <div class="card">
                        <h4 class="card-title text-center">
                            <a class="product" href="#">
                          <?= $products->name ?>
                        </a>
                        </h4>
                        <a class="img-card" href="#">
                    <img class="img-responsive" src="<?= $products->image ?>"/>
                </a>
                        <br />
                        <div class="card-content">    
                            
                         
                            <div class=" text-center">
                                <a class="btn">
                                    <h4>View More info</h4>
                                </a>
                            </div>

                        </div>
                        <div class="btcnt" style="text-align:Center">
                            <button type="submit" class="btinqr btn-block" data-target="#modal-1" data-toggle="modal"><p class="s2">ENQUIRE</p></button>
                        </div>
                    </div>
                </div>


                <?php endforeach; ?>



            <div class="row">
               
            </div>
           
            <center> <h2>  <?= LinkPager::widget(['pagination' => $pagination]) ?> <h2> </center>
    </div>



    <!-- scroll top -->
    <div class="scroll-top-wrapper ">
        <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up"></i>
  </span>
    </div>
    </div>
