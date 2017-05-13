<div class="form-group">
                        <label>Price</label>
                        <div class="row">
                            <div class="col-sm-3">
                                <select class="form-control" name="price_unit">
                                    <option value="tzs">TSH-(tzs)</option>
                                    <option value="usd">USD-($)</option>
                                </select>
                            </div>
                            <div class="col-sm-9">
                              <input type="text" class="form-control validate[required, custom[integer]]" data-errormessage-custom-error="Ingredient Price must be a number"  data-errormessage-value-missing="Price is required!"   name="price"  placeholder="Enter  Price">
                            </div>
                        </div>
                      </div>