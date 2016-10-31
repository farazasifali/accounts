<div class="panel-heading">
    <div class="row">
        <div class="col-sm-6">
            <span class="panel-title-heading">
                <?php echo $this->title; ?>
            </span>
        </div>
    </div>
</div>

<div class="panel-body">
    <div class="table-responsive">
        <form action="<?= site_url('Expenses/update/'.$this->uri->segment(3)); ?>" method="post">
            
            <div class="form-group">
                <label class="control-label" for="category">Select Category</label>
                <select id="category" name="category" class="form-control">
                    <?php foreach($expense_categories as $category){ ?>
                        <option 
                            value="<?= $category->exp_cat_id ?>" 
                            <?= isset($formData['category']) && $formData['category'] == $category->exp_cat_id ? "selected" : ''; ?> >
                            <?= $category->exp_cat_name ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="form-group">
                <label class="control-label" for="person">Select Person</label>
                <select id="person" name="person" class="form-control">
                    <?php foreach($expense_persons as $person){ ?>
                        <option 
                            value="<?= $person->person_id ?>" 
                            <?= isset($formData['person']) && $formData['person'] == $person->person_id ? "selected" : ''; ?>>
                            
                            <?= $person->person_name ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="form-group">
                <label class="control-label" for="description">Description</label>
                <input 
                    id="description" 
                    name="description" 
                    class="form-control" 
                    type="text" 
                    value="<?= isset($formData['description']) ? $formData['description'] : '' ?>"
                    placeholder="Expense Description"
                />
            </div>
            
            <div class="form-group">
                <label class="control-label" for="amount">Amount</label>
                <input 
                    id="amount" 
                    name="amount" 
                    class="form-control" 
                    type="number" 
                    value="<?= isset($formData['amount']) ? $formData['amount'] : '' ?>"
                    placeholder="Expense Amount"
                />
            </div>
            
            <div class="form-group text-right">
                <label class="control-label" for="submit"></label>
                <input type="submit" value="Save" class="btn btn-success" id="submit">
            </div>
        </form>
    </div>
</div>