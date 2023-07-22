@extends('admin.layouts.master')
@section('content')
<main class="w-full h-screen overflow-y-auto rounded-2xl hidden__scrollbar">
    <section class="flex w-full h-screen gap-1">
        <article class="w-full h-full px-4 py-3 bg-white shadow-xs sm:px-5 sm:py-3">
            <!-- Breadcrumb Start -->
            <div class="my-6 flex flex-col gap-3 sm:flex-row ">
                <nav>
                    <ol class="flex items-center gap-2 text-sm">
                        <li>
                            <a class="font-medium" href="{{ route('admin.user.index') }}">Quản lý bài viết</a>
                        </li>
                        <li class="text-primary">/ Tiêu đề bài viết</li>
                    </ol>
                </nav>
            </div>
            <!-- Breadcrumb End -->

            <section class="w-full h-full ">
                <h1 class="text-3xl font-bold text-gray-800">Thị Trường BĐS 2023 Chịu Tác Động Từ Những Yếu Tố Nào?</h1>
                <div class="author-info flex items-center gap-2 p-2 mt-3">
                    <div class="avatar w-12 h-12 rounded-full object-cover overflow-hidden">
                        <img src="https://i.pravatar.cc/100" alt="avatar">
                    </div>
                    <div class="author-name flex flex-col">
                        <a href="#" class="text-sm  text-gray-700">Được đăng bởi
                            <span class="hover:text-indigo-500 hover:underline text-sm font-medium text-gray-700">Nguyễn Văn A</span>
                        </a>
                        <span class="text-xs text-gray-500">Cập nhật lần cuối vào 10/10/2021</span>
                    </div>
                </div>
                <div class="description my-3">
                    <p class="text-gray-900  font-sunbee">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis temporibus
                        reiciendis delectus deleniti eos repudiandae iusto neque quo quae
                        facilis ea numquam aliquid ad officiis, error exercitationem dolores officia. Ea.</p>
                </div>

                <div id="content__post">
                    <h2>Thị Trường BĐS 2023: T&aacute;c Động Từ Nhiều Yếu Tố</h2>
                    <div class="p">Theo Chủ tịch&nbsp;<a class="" href="https://vars.com.vn/" target="_blank" rel="noreferrer noopener" data-block-type="custom-link">Hội M&ocirc;i giới Bất động sản Việt Nam</a>, sự ph&aacute;t triển của thị trường BĐS 2023 trong những th&aacute;ng cuối năm sẽ chịu t&aacute;c động từ nhiều yếu tố. Trước hết, sự t&aacute;c động đến từ&nbsp;<a class="" href="https://www.gso.gov.vn/bai-top/2023/06/bao-cao-tinh-hinh-kinh-te-xa-hoi-quy-ii-va-6-thang-dau-nam-2023/" target="_blank" rel="noreferrer noopener" data-block-type="custom-link">GDP 6 th&aacute;ng đầu năm 2023</a>&nbsp;v&agrave; nguồn vốn FDI đổ v&agrave;o Việt Nam thời gian qua. Được biết, GDP 6 th&aacute;ng đầu năm 2023 tăng 3,72%, chỉ cao hơn tốc độ tăng 1,74% của 6 th&aacute;ng đầu năm 2020. Về nguồn vốn FDI, t&iacute;nh đến ng&agrave;y 20/6, tổng vốn đầu tư nước ngo&agrave;i đăng k&yacute; v&agrave;o Việt Nam đạt 13,43 tỷ USD, giảm 4,3% so với c&ugrave;ng kỳ năm trước. Sự giảm nhẹ n&agrave;y khiến lĩnh vực bất động sản từng đứng vị tr&iacute; thứ 2 trong thu h&uacute;t FDI, tụt xuống vị tr&iacute; thứ 3 với tổng vốn đăng k&yacute; l&agrave; 1,53 tỷ USD, giảm 51,5% so với c&ugrave;ng kỳ.</div>
                    <div class="p"><strong>Xem th&ecirc;m:</strong>&nbsp;<a class="" href="https://batdongsan.com.vn/tin-tuc/khu-dong-ha-noi-co-thuc-su-tiem-nang-de-dau-tu-cd-hn-773573" target="_blank" rel="noreferrer noopener" data-block-type="custom-link"><strong>Khu Đ&ocirc;ng H&agrave; Nội: C&oacute; Thực Sự Tiềm Năng Để Đầu Tư?</strong></a></div>
                    <div class="p">B&ecirc;n cạnh đ&oacute;, kinh tế thế giới c&oacute; nhiều biến động cũng t&aacute;c động đến thị trường BĐS 2023. Cụ thể, trong th&aacute;ng 6/2023, việc FED tạm dừng tăng l&atilde;i suất đ&atilde; c&oacute; t&aacute;c động t&iacute;ch cực đến t&acirc;m l&yacute; thị trường c&aacute;c lĩnh vực, đặc biệt BĐS. Ngo&agrave;i ra, theo số liệu kinh tế Tổng cục Thống k&ecirc; Trung Quốc th&igrave; hiện nền kinh tế Trung Quốc đang phục hồi kh&ocirc;ng như k&igrave; vọng. Ch&iacute;nh bởi vậy m&agrave; nhu cầu h&agrave;ng ho&aacute;, nhập khẩu v&agrave; xuất khẩu của Trung Quốc giảm, t&aacute;c động kh&ocirc;ng t&iacute;ch cực đến nền kinh tế thế giới, trong đ&oacute; c&oacute; Việt Nam.</div>
                    <figure class="wp-block-image size-full is-resized"><img src="https://img.iproperty.com.my/angel/750x1000-fit/wp-content/uploads/sites/7/2023/07/bds-1-2-1.jpg" alt="" loading="lazy" />
                        <figcaption><em>Thị trường BĐS 2023 đang chịu t&aacute;c động từ nhiều yếu tố</em></figcaption>
                    </figure>
                    <div class="p">H&agrave;nh lang ph&aacute;p luật cũng đang t&aacute;c động t&iacute;ch cực đến thị trường BĐS 2023 khi Ch&iacute;nh phủ tiếp tục quan t&acirc;m, đồng h&agrave;nh v&agrave; gỡ kh&oacute; thị trường BĐS th&ocirc;ng qua việc ban h&agrave;nh h&agrave;ng loạt c&aacute;c nghị định/nghị quyết/th&ocirc;ng tư/c&ocirc;ng văn chỉ đạo&hellip; Đ&aacute;ng ch&uacute; &yacute;, một số tỉnh/th&agrave;nh phố đ&atilde; v&agrave;o cuộc, th&aacute;o gỡ kh&oacute; khăn vướng mắc cho c&aacute;c dự &aacute;n cụ thể.</div>
                    <div class="p">Ngo&agrave;i ra, đầu tư c&ocirc;ng đang c&oacute; những chuyển biến t&iacute;ch cực khi vốn đầu tư thực hiện từ nguồn ng&acirc;n s&aacute;ch Nh&agrave; nước 5 th&aacute;ng đầu năm 2023 tăng 18,4% so với c&ugrave;ng kỳ năm trước. Ch&iacute;nh s&aacute;ch đẩy mạnh giải ng&acirc;n đầu tư c&ocirc;ng, đặc biệt trong lĩnh vực cơ sở hạ tầng với h&agrave;ng loạt tuyến đường cao tốc&hellip; sẽ th&uacute;c đẩy tăng trưởng kinh tế, l&agrave; chất x&uacute;c t&aacute;c cho sự phục hồi của thị trường bất động sản.</div>
                    <h2>Dự B&aacute;o Bức Tranh Thị Trường BĐS 2023 Trong Nửa Cuối Năm</h2>
                    <div class="p">Trao đổi với&nbsp;<a class="" href="https://batdongsan.com.vn/" target="_blank" rel="noreferrer noopener" data-block-type="custom-link">Batdongsan.com.vn</a>, b&agrave; Phạm Th&igrave; Miền, Ph&oacute; Ban nghi&ecirc;n cứu thị trường v&agrave; Tư vấn x&uacute;c tiến đầu tư của Hội M&ocirc;i giới Bất động sản Việt Nam cho biết trong 6 th&aacute;ng cuối năm, thị trường BĐS 2023 sẽ ghi nhận sự cải thiện nguồn cung v&agrave; giao dịch theo chiều hướng t&iacute;ch cực từ c&aacute;c sản phẩm đ&aacute;p ứng nhu cầu ở thật, c&oacute; ph&aacute;p l&yacute; tốt, đến từ c&aacute;c CĐT c&oacute; uy t&iacute;n lớn tr&ecirc;n thị trường. Trong 6 th&aacute;ng cuối năm, nguồn cung nh&agrave; ở x&atilde; hội cũng sẽ nhiều l&ecirc;n với một số dự &aacute;n mới.</div>
                    <div class="p">Cũng theo b&agrave; Miền, hoạt động&nbsp;<a class="" href="https://batdongsan.com.vn/tin-tuc/mua-ban-sap-nhap-phao-cuu-sinh-cua-thi-truong-bds-cd-hn-770761" target="_blank" rel="noreferrer noopener" data-block-type="custom-link">M&amp;A bất động sản</a>&nbsp;sẽ tiếp tục s&ocirc;i động trong 6 th&aacute;ng cuối năm của thị trường BĐS 2023. C&aacute;c thương vụ mới chỉ dừng ở bước thăm d&ograve;, khảo s&aacute;t trong qu&yacute; 2 th&igrave; sẽ c&oacute; bước tiến mới, chuyển sang bước đ&agrave;m ph&aacute;n, thương lượng trong qu&yacute; 3. Do đ&oacute;, khả năng cao thị trường sẽ chứng kiến một v&agrave;i thương vụ th&agrave;nh c&ocirc;ng trong qu&yacute; 4/2023. Hoạt động M&amp; A bất động sản được đẩy mạnh g&oacute;p phần cải thiện nguồn cung của thị trường BĐS 2023 trong c&aacute;c th&aacute;ng cuối năm. Bởi lẽ, c&aacute;c dự &aacute;n dang dở, về tay chủ đầu tư mới c&oacute; tiềm lực t&agrave;i ch&iacute;nh sẽ được t&aacute;i khởi động. C&aacute;c chủ doanh nghiệp thu được tiền từ M&amp;A cũng c&oacute; nguồn để quay lại thực hiện c&aacute;c dự &aacute;n c&ograve;n giữ lại.</div>
                    <figure class="wp-block-image size-full"><img src="https://img.iproperty.com.my/angel/750x1000-fit/wp-content/uploads/sites/7/2023/07/anh-2-3.jpg" alt="" loading="lazy" />
                        <figcaption><em>Bức tranh thị trường BĐS 2023 sẽ tươi s&aacute;ng hơn</em></figcaption>
                    </figure>
                    <div class="p">Ri&ecirc;ng với ph&acirc;n kh&uacute;c BĐS nh&agrave; ở, nguồn cung sẽ được cải thiện dần v&agrave; r&otilde; n&eacute;t từ cuối qu&yacute; 3, dự kiến đạt khoảng 28.000 sản phẩm trong qu&yacute; 3 v&agrave; tr&ecirc;n 30.000 sản phẩm trong qu&yacute; 4. Nguồn cầu của thị trường sẽ dần ổn định v&agrave; tăng dần từ nay đến cuối năm khi niềm tin của người mua được cung cố do t&aacute;c động của c&aacute;c ch&iacute;nh s&aacute;ch v&agrave; do sự cải thiện của nguồn cung.</div>
                    <div class="p">Gi&aacute; b&aacute;n của ph&acirc;n kh&uacute;c BĐS nh&agrave; ở sẽ tăng nhẹ ở ph&acirc;n kh&uacute;c&nbsp;<a class="" href="https://batdongsan.com.vn/ban-can-ho-chung-cu-ha-noi" target="_blank" rel="noreferrer noopener" data-block-type="custom-link">căn hộ trung cấp</a>&nbsp;v&agrave; đi ngang ở ph&acirc;n kh&uacute;c&nbsp;<a class="" href="https://batdongsan.com.vn/ban-can-ho-chung-cu-ha-noi" target="_blank" rel="noreferrer noopener" data-block-type="custom-link">căn hộ cao cấp</a>. C&aacute;c ph&acirc;n kh&uacute;c c&ograve;n lại của thị trường như&nbsp;<a class="" href="https://batdongsan.com.vn/ban-dat-nen-du-an-ha-noi" target="_blank" rel="noreferrer noopener" data-block-type="custom-link">đất nền</a>,&nbsp;<a class="" href="https://batdongsan.com.vn/ban-nha-biet-thu-lien-ke-ha-noi" target="_blank" rel="noreferrer noopener" data-block-type="custom-link">biệt thự, liền kề</a>, shophouse sẽ tiếp tục giảm nhẹ gi&aacute; b&aacute;n tr&ecirc;n thị trường thứ cấp v&agrave; dần ổn định v&agrave;o cuối qu&yacute; 3/2023. Giao dịch của thị trường BĐS 2023 sẽ tiếp tục đ&agrave; tăng v&agrave; dễ đạt được kết quả ấn tượng v&agrave;o khoảng giữa đến cuối qu&yacute; 4 khi nguồn cung được cải thiện, niềm tin v&agrave;o thị trường của kh&aacute;ch h&agrave;ng được vực dậy</div>
                </div>
                <div class="approve__post flex justify-center items-center gap-2 pb-5">
                    <button class="btn btn-error text-white">Xóa bài viết</button>
                    <button class="btn btn-primary">Duyệt bài viết</button>
                </div>
            </section>
        </article>
    </section>
</main>
@endsection
