<style>
	.attendance tr th{
		text-align: center;
	}
	.attendance label{
		display: block;
	}
    .reg-publish td{
        padding: 0 !important;
        border:  1px solid #bcb9b9 !important;
    }
    .reg-publish td input[type="text"]{
        border: 1px solid transparent;
    }

	@media print{
		aside{
			display: none !important;
		}
		nav{
			display: none;
		}
		.panel{
			border: 1px solid transparent;
			left: 0px;
			position: absolute;
			top: 0px;
			width: 100%;
		}
		.box-width{
			width: 50%;
		}
		.none{
			display: none;
		}
		.panel-heading{
			display: none;
		}
		
		.panel-footer{
			display: none;
		}
        .hide{
            display: block !important;
        }
        .title{
            font-size:  25px;
        }
	}

</style>
<div class="container-fluid">
    <div class="row">
        <div class="panel panel-default none">

            <div class="panel-heading">
                <div class="panal-header-title pull-left">
                    <h1>Result</h1>
                </div>
            </div>

            <div class="panel-body">
                <?php echo $confirmation; ?>

                <?php
                $attribute = array("class" => "form-horizontal");
                echo form_open("", $attribute);
                ?>

                <div class="form-group">
                    <label class="col-md-2 control-label">Message <span class="req">*</span></label>
                    <div class="col-md-5">
                        <textarea name="message" class="form-control" ><?php echo $msg_info[0]->message; ?></textarea>
                    </div>
                </div>

				<div class="form-group ">
					<label class="col-md-2 control-label">Status <span class="req">*</span></label>
					<div class="col-md-5">
						<label class="radio-inline">
							<input name="status" <?php if ($msg_info[0]->is_publish=="publish"){echo "checked" ;} ?> value="publish" type="radio"> Publish
						</label>
						<label class="radio-inline">
							<input name="status" <?php if ($msg_info[0]->is_publish=="un_publish"){echo "checked" ;} ?> value="un_publish" type="radio"> Un Publish
						</label>
					</div>
				</div>

                <div class="col-md-7">
                    <div class="btn-group pull-right">
                        <input type="submit" value="Save" name="save" class="btn btn-primary">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>

            <div class="panel-footer">&nbsp;</div>
        </div>

    </div>
</div>