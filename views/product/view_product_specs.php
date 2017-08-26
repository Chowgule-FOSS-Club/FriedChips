<div class="container">

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
                                        <div class="col-xs-3">
                                            <label  for="quantity">Quantity</label>
                                            <input type="text" id="quantity" class="form-control" name="quantity">
                                        </div>

                                        <div class="col-xs-3">
                                            <label  for="unit">Select Unit</label>
                                            <select id="units" class="form-control" name="unit">
                                                                <option value="0" disabled selected>Select unit</option>
                                                        <option value="Kilograms">Kilograms</option>
                                                        <option value="Nos">Nos</option>
                                                        <option value="Pieces">Pieces</option>
                                                        <option value="Tons">Tons</option>
                                                        <option value="Unit">Unit</option>
                                                    </select>
                                        </div>
                                        <div class="col-xs-6">

                                            <label  >Approximate Order Value</label>
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
                                    </div>
                                </div>

                                            <div class="row-fluid" style="padding-top:3%">
                                            <div class="form-group">
                                                <label for="usage" class="">Usage/Application</label>
                                                <input type="text" id="usage" class="form-control" name="usage">
                                            </div>
                                            <div class="form-group">
                                                <label for="other" class="">Other Requirements</label>
                                                <textarea name="InputMessage" rows="6" class="form-control" type="text" placeholder="Provide any specific details about :'Product/Service required', 'Quality', 'Standard', 'Size' etc... "></textarea>
                                            </div>
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

            <div class="row">
                <div class=" col-md-4">

                    <div>
                        <div class="img-card1">
                            <img class="img-responsive" src="<?=$product[0]->p->image?>" />

                            <br />
                        </div>

                        <div class="btcnt" style="text-align:center">

                            <button type="submit" class="btnview btn-responsive" data-target="#modal-1" data-toggle="modal"><p >ENQUIRE</p></button>

                        </div>
                    </div>

                </div>
                <div class=" col-sm-8">
                    <h2 class="h2title"><?=$product[0]->p->name?></h2>
                    <hr class="hr-primary">

                    <p class="info">
                       <?=$product[0]->p->description?>
                    </p>
                </div>

                <button type="button" class="btncollapse col-sm-5 col-md-4 col-xs-7 col-lg-2" data-toggle="collapse" data-target="#table">Specification</button>

                <div id="table" class="collapse col-sm-8 col-md-8 col-xs-8 col-lg-8">
                    <div class="table table-striped">
                        <table class="table">
                            <tbody>

                            <?php foreach ($product as $product_spec) : ?> 
       
                                <tr>
                                    <th> <?= $product_spec->s->name?></th>
                                    <td> <?= $product_spec->value?></td>
                                </tr>
                                <?php endforeach?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>

        </div>
        

    </div>