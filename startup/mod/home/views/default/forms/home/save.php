<?php
/**
 * Edit home form
 *
 * @package home
 */


?>
<ul class="tabs tab2">
	<li class="active"><a href="#" class="que"><span class="icon"></span><?php echo elgg_echo("home:sharequestion")?></a><span class="arrow-down"></span></li>
    <!-- <li><a href="#" class="link"><span class="icon"></span>Share a Link</a><span class="arrow-down"></span></li>
    <li><a href="#" class="file"><span class="icon"></span>Share a File</a><span class="arrow-down"></span></li> -->
</ul>
                <div class="detail2 tab-detail clearfix">
                	<div class="col-sm-12 clearfix">
                    	<div class="plr10 clearfix">
    						<?php echo elgg_view('input/longtext',array('name' => 'body', 'id' => 'textarea-home', 'placeholder' => elgg_echo("home:form:textarea"), 'rows'=> '3')); ?>
                        </div>
                        <div class="plr10 clearfix">
                        
                        	<div class="border select-func clearfix">
                        	<?php echo elgg_view ( 'input/functions', array_merge($vars, array('class'=>'selectpicker show-tick form-control functions-dropdown')) ); ?>
                        	<?php echo elgg_view ( 'input/spaces', array_merge($vars, array('class'=>'selectpicker show-tick form-control spaces-dropdown')) ); ?>
                                
                                
                                <!-- 
                                <div class="select-option">
                                	<input type="checkbox" class="checkbox" />
                                    <label>Everyone</label>
                                    <input type="checkbox" class="checkbox" />
                                    <label>Leadership</label>
                                    <input type="checkbox" class="checkbox" />
                                    <label>Founders</label>
                                </div>
                                 -->
                           </div>
                        </div>
                         <div class="plr10 clearfix">
                        	<div class="" id="functions-list">
                            	
                            </div>
                        </div>
                        <div class="plr10 clearfix">
                        	<div class="" id="spaces-list">
                            	
                            </div>
                        </div>
                    </div>
                    
                    <div class="bottom-bt col-sm-12 col-xs-12">
                        <div class="plr10">
                              <button type="reset" class="cancel-bt right" name="" value="Cancel">Cancel</button>                          
                              <button type="submit" class="submit-btn2 right" name="Share" value="Share">Share</button>
                        </div>
                    </div>
                    
   </div>

