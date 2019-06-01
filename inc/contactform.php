<div id="form__wrapper" class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 text-center ">
           <?php if( is_home() || is_paged() ){
           $form = get_field('contact_form', 134);
           }else{
           $form = get_field('contact_form');
           }?>
            <p class="title">
                <?php echo $form['form_title']; ?>
            </p>
            <p class="desc">
                <?php echo $form['form_desc']; ?>
            </p>
            <form action="" method="post">
               <?php echo '<style>textarea[name="comment"],textarea[name="message"]{display:none}</style>'; ?>
                <textarea name="comment"></textarea>
		        <textarea name="message"></textarea>
                <div class="row">
                    <div class="col-12 col-md-6">
                   <div class="form-group">
                        <label for="name" class="sr-only">Email address</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Your name">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="sr-only">Email address</label>
                        <input type="tel" class="form-control" id="phone" aria-describedby="tel" placeholder="Contact phone">
                    </div>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                     <div class="form-group">
                         <label for="question" class="sr-only">Your question</label>
                         <textarea name="question" id="question" cols="30" rows="6" placeholder="Your question..." class="form-control"></textarea>   
                     </div>                   
                </div>
                <div class="col-12">
                    <input type="submit" value="Ask the question">
                </div>
                </div>
            </form>
        </div>
    </div>
</div>