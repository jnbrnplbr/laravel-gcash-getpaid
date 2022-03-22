<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="row container mt-5">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body p-6" style="padding-top: 20px !important;">
                <h2>"Pay Now" Button</h2>
                <p>
                    Here you may create a "Pay Now" button that you may integrate in your website.<br />
                    Set the following values to create the "Pay Now" button
                </p>
                <form method="POST">
                    @csrf 
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <label class="form-label">Amount (PHP)</label>
                            </div>
                            <div class="col-8">
                                <input class="form-control createpr-field x-createpr-field" type="number" value="1" name="amount" step=".01" placeholder="e.g. 1000.00" />
                                <div class="invalid-feedback">Invalid amount</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <label
                                    class="form-label"
                                    data-template="<div class='tooltip' role='tooltip'><div class='tooltip-inner bg-warning-100'></div></div>"
                                    data-placement="bottom"
                                    data-toggle="tooltip"
                                    title=""
                                    data-original-title="Fee to be displayed to customers"
                                >
                                    Optional add-on fee to customers &nbsp;<i class="fa fa-info-circle" aria-hidden="true"></i>
                                </label>
                            </div>
                            <div class="col-8">
                                <input class="form-control createpr-field x-createpr-field" type="number" value="0" name="fee" placeholder="0.00" />
                                <div class="invalid-feedback">Invalid fee</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <label class="form-label">Expiry</label>
                            </div>
                            <div class="col-8">
                                <select class="form-control createpr-field x-createpr-field" name="expiry" required="">
                                    <option value="6" selected>6 Hours</option>
                                    <option value="12">12 Hours</option>
                                    <option value="24">1 day</option>
                                    <option value="168">7 days</option>
                                </select>
                                <div class="invalid-feedback">Invalid Expiry</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 my-auto">
                                <label class="form-label">Description</label>
                            </div>
                            <div class="col-8">
                                <textarea required="" class="form-control createpr-field x-createpr-field text-left" rows="2" name="description" value="Payment for services rendered" placeholder="e.g. Payment for services rendered">Payment for services rendered</textarea>
                                <div class="invalid-feedback">Please input a description</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-grid gap-2">
                        <button class="btn btn-primary mt-3 " type="submit" formaction="/pay">Pay Now</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>