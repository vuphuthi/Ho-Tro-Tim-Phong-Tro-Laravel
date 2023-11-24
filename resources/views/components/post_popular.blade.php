<section class="popular-posts">
    <div class="section-title">Tin nổi bật</div>
    <div class="posts-listing style-gird">
        @for ($i = 0; $i < 6; $i++)
        <div class="col-item">
            <div class="col-item__image">
                <a href="" class="a-img">
                    <img src="{{ url('images/news-1.jpg') }}" alt="">
                    <span class="images-number">5 ảnh</span>
                    <span class="chothuenhanh-label"></span>
                    <span class="post-save js-btn-save">
                        <i></i>
                    </span>
                </a>
            </div>
            <div class="col-item__info">
                <div class="post-title">
                    <span class="star star-5"></span>
                    <a href="#">PHÒNG TRỌ GẦN NGÃ 4 LÊ ĐỨC THỌ VS PHẠM VĂN CHIÊU</a>
                </div>
                <div class="post-price">3 triệu/tháng</div>
                <div class="post-acreage fz-13">22m²</div>
                <div class="post-location fz-13">
                    <a href="#" title="Cho thuê Phòng trọ Quận Gò Vấp, Hồ Chí Minh">Quận Gò Vấp, Hồ Chí Minh</a>
                </div>
                <time class="post-time fz-13">Cập nhật: 2 giờ trước</time>
                <span class="post-hot"></span>
            </div>
        </div>
        @endfor
    </div>
</section>