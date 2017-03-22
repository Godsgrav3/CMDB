<?php
include "header.php";
include "my_autoloader.php";
include "php/opendb.php";
spl_autoload_register('my_autoloader');

$hw = new GetHardware();
$hw->getHardware($_GET['ID']);
$hardware = $hw->returnResult();

?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Aanpassen CI
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6">

            <form role="form">

                <div class="form-group">
                    <label>CI naam</label>
                    <input class="form-control" value="<?php echo $hardware['0']['hardwareTitle']; ?>" disabled>
                </div>

                <?php
                // Get hardware types from Database
                $stmt = $dbh->prepare('SELECT HID, hardwareType FROM hardwaretype ORDER BY HID ASC');
                $stmt->execute();
                $hardwareType = $stmt->fetchall(PDO::FETCH_ASSOC);
                ?>
                <div class="form-group">
                    <label>CI hardware type</label>
                    <select class="form-control">
                      <?php
                      foreach ($hardwareType as $key => $value) {
                        ?>
                        <option value="<?php echo $hardwareType[$key]['HID']; echo'"'; if($hardwareType[$key]['HID'] == $hardware['0']['hardwareType']) {echo 'selected="selected"';} ?>"><?php echo $hardwareType[$key]['hardwareType']?></option>
                        <?php
                      }
                      ?>
                    </select>
                </div>

                <?php
                // Get hardware manufacturers from Database
                $stmt = $dbh->prepare('SELECT MID, manufacturerName FROM manufacturer ORDER BY MID ASC');
                $stmt->execute();
                $manufacturer = $stmt->fetchall(PDO::FETCH_ASSOC);
                ?>
                <div class="form-group">
                    <label>CI merk</label>
                    <select class="form-control">
                      <?php
                      foreach ($manufacturer as $key => $value) {
                        ?>
                        <<option value="<?php echo $manufacturer[$key]['MID']; echo'"'; if($manufacturer[$key]['MID'] == $hardware['0']['manufacturer']) {echo 'selected="selected"';} ?>"><?php echo $manufacturer[$key]['manufacturerName']?></option>
                        <?php
                      }
                      ?>
                    </select>
                </div>

                <?php
                // Get hardware resellers from Database
                $stmt = $dbh->prepare('SELECT RID, resellerName FROM reseller ORDER BY RID ASC');
                $stmt->execute();
                $reseller = $stmt->fetchall(PDO::FETCH_ASSOC);
                ?>
                <div class="form-group">
                    <label>CI hardware type</label>
                    <select class="form-control">
                      <?php
                      foreach ($reseller as $key => $value) {
                        ?>
                        <option value="<?php echo $reseller[$key]['RID']; echo'"'; if($reseller[$key]['RID'] == $hardware['0']['reseller']) {echo 'selected="selected"';} ?>"><?php echo $reseller[$key]['resellerName']?></option>
                        <?php
                      }
                      ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>CI eigenaar</label>
                    <input class="form-control" type="text" placeholder="<?php echo $hardware[0]['user']; ?> " />
                </div>

                <div class="form-group">
                    <label>File toevoegen</label>
                    <input type="file">
                </div>

                <label>aankoop waarden CI</label>
                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-eur"></i></span>
                    <input type="number" step="0,01" class="form-control">
                </div>

                <div class="form-group">
                    <label>Text area</label>
                    <textarea class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Checkboxes</label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">Checkbox 1
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">Checkbox 2
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="">Checkbox 3
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Inline Checkboxes</label>
                    <label class="checkbox-inline">
                        <input type="checkbox">1
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox">2
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox">3
                    </label>
                </div>

                <div class="form-group">
                    <label>Radio Buttons</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio 1
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Inline Radio Buttons</label>
                    <label class="radio-inline">
                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                    </label>
                </div>

                <div class="form-group">
                    <label>Selects</label>
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option selected="selected">3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Multiple Selects</label>
                    <select multiple class="form-control">
                        <option >1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-default">Submit Button</button>
                <button type="reset" class="btn btn-default">Reset Button</button>

            </form>

        </div>
        <div class="col-lg-6">
            <h1>Disabled Form States</h1>

            <form role="form">

                <fieldset disabled>

                    <div class="form-group">
                        <label for="disabledSelect">Disabled input</label>
                        <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled>
                    </div>

                    <div class="form-group">
                        <label for="disabledSelect">Disabled select menu</label>
                        <select id="disabledSelect" class="form-control">
                            <option>Disabled select</option>
                        </select>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox">Disabled Checkbox
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary">Disabled Button</button>

                </fieldset>

            </form>

            <h1>Form Validation</h1>

            <form role="form">

                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Input with success</label>
                    <input type="text" class="form-control" id="inputSuccess">
                </div>

                <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning">Input with warning</label>
                    <input type="text" class="form-control" id="inputWarning">
                </div>

                <div class="form-group has-error">
                    <label class="control-label" for="inputError">Input with error</label>
                    <input type="text" class="form-control" id="inputError">
                </div>

            </form>

            <h1>Input Groups</h1>

            <form role="form">

                <div class="form-group input-group">
                    <span class="input-group-addon">@</span>
                    <input type="text" class="form-control" placeholder="Username">
                </div>

                <div class="form-group input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-addon">.00</span>
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-eur"></i></span>
                    <input type="text" class="form-control" placeholder="Font Awesome Icon">
                </div>

                <div class="form-group input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control">
                    <span class="input-group-addon">.00</span>
                </div>

                <div class="form-group input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></span>
                </div>

            </form>

            <p>For complete documentation, please visit <a href="http://getbootstrap.com/css/#forms">Bootstrap's Form Documentation</a>.</p>

        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

<?php

include "footer.php";

?>
