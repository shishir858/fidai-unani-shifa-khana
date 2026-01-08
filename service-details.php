<?php include 'includes/header.php';?>

    <!-- ========================
       page title 
    =========================== -->
    <?php
    $treatments = [
      'cancer' => [
        'title' => 'Cancer Treatment (Unani Supportive Care)',
        'icon' => 'icon-head',
        'image' => 'assets/images/page-titles/cancer.png',
        'feature_image' => 'assets/images/page-titles/cancer.png',
        'desc' => 'यूनानी चिकित्सा के माध्यम से कैंसर के लक्षणों को कम करना, इम्युनिटी बढ़ाना और जीवन की गुणवत्ता सुधारना।',
        'details' => 'यूनानी इलाज में हर्बल दवाइयों द्वारा शरीर की रोग प्रतिरोधक क्षमता को मजबूत किया जाता है। इससे कीमोथेरेपी के साइड इफेक्ट कम होते हैं और मरीज को बेहतर जीवन मिलता है।',
        'description' => 'Unani supportive care for cancer focuses on improving immunity, reducing symptoms, and enhancing quality of life using herbal medicines and natural therapies.',
        'features' => ['Herbal Immunity Boosters', 'Side Effect Reduction', 'Holistic Care', 'Improved Quality of Life'],
        'list' => ['Lung Cancer', 'Liver Cancer', 'Gall Bladder Cancer'],
        'plans' => [
          'title' => 'Cancer Care Plans',
          'items' => [
            'Personalized herbal regimen',
            'Diet and lifestyle guidance',
            'Supportive therapies for chemo/radiation',
            'Regular immunity monitoring',
          ],
          'price' => '$120',
          'period' => '/Month',
        ],
        'core_values' => [
          'Holistic healing',
          'Patient-centered care',
          'Continuous support',
          'Research-driven therapies',
        ],
        'tips' => 'Maintain a healthy diet, stay active, and follow your Unani physician’s advice for best results during cancer treatment.',
      ],
      'liver' => [
        'title' => 'Liver Disease Treatment',
        'icon' => 'icon-heart',
        'image' => 'assets/images/page-titles/liver.png',
        'feature_image' => 'assets/images/page-titles/liver.png',
        'desc' => 'लीवर से जुड़ी सभी गंभीर बीमारियों का सुरक्षित यूनानी इलाज।',
        'details' => 'यूनानी चिकित्सा लीवर को डिटॉक्स कर उसकी कार्यक्षमता बढ़ाती है। CLD, सिरोसिस और हेपेटाइटिस जैसी बीमारियों में प्राकृतिक सुधार देखने को मिलता है।',
        'description' => 'Safe and natural Unani treatment for all major liver diseases, focusing on detoxification and improved liver function.',
        'features' => ['Liver Detoxification', 'Natural Remedies', 'Improved Function', 'Support for CLD & Hepatitis'],
        'list' => ['CLD (Chronic Liver Disease)', 'Liver Failure', 'Cirrhosis', 'Hepatitis', 'Fatty Liver'],
        'plans' => [
          'title' => 'Liver Health Plans',
          'items' => [
            'Liver detoxification program',
            'Customized herbal supplements',
            'Monthly liver function tests',
            'Dietary and lifestyle counseling',
          ],
          'price' => '$90',
          'period' => '/Month',
        ],
        'core_values' => [
          'Natural detox',
          'Long-term wellness',
          'Patient education',
          'Safe and effective care',
        ],
        'tips' => 'Avoid alcohol, eat liver-friendly foods, and use prescribed Unani medicines for optimal liver health.',
      ],
      'kidney' => [
        'title' => 'Kidney Disease Treatment',
        'icon' => 'icon-microscope',
        'image' => 'assets/images/page-titles/kidney.png',
        'feature_image' => 'assets/images/page-titles/kidney.png',
        'desc' => 'डायलिसिस से बचाव और किडनी फंक्शन सुधार के लिए यूनानी इलाज।',
        'details' => 'यूनानी हर्बल दवाइयाँ किडनी पर बिना दबाव डाले धीरे-धीरे सुधार लाती हैं और शरीर से विषैले तत्व बाहर निकालती हैं।',
        'description' => 'Unani herbal medicines gradually improve kidney function and help avoid dialysis by removing toxins naturally.',
        'features' => ['Dialysis Avoidance', 'Herbal Detox', 'Gradual Improvement', 'No Side Effects'],
        'list' => ['Kidney Failure', 'Chronic Kidney Disease'],
        'plans' => [
          'title' => 'Kidney Wellness Plans',
          'items' => [
            'Herbal diuretics',
            'Toxin elimination therapies',
            'Routine kidney function monitoring',
            'Fluid and salt balance guidance',
          ],
          'price' => '$100',
          'period' => '/Month',
        ],
        'core_values' => [
          'Gentle healing',
          'Prevention focused',
          'Patient empowerment',
          'Continuous improvement',
        ],
        'tips' => 'Stay hydrated, limit salt intake, and follow your Unani doctor’s advice for kidney care.',
      ],
      'heart' => [
        'title' => 'Heart & Blood Disorders',
        'icon' => 'icon-dropper',
        'image' => 'assets/images/page-titles/heart.png',
        'feature_image' => 'assets/images/page-titles/heart.png',
        'desc' => 'दिल और ब्लड प्रेशर की समस्या का स्थायी समाधान।',
        'details' => 'यूनानी इलाज रक्त प्रवाह को संतुलित करता है, कोलेस्ट्रॉल घटाता है और हृदय को मजबूत बनाता है।',
        'description' => 'Permanent Unani solutions for heart and blood pressure problems, balancing blood flow and strengthening the heart.',
        'features' => ['Blood Flow Balance', 'Cholesterol Reduction', 'Heart Strengthening', 'Natural Therapies'],
        'list' => ['High Blood Pressure', 'Low Blood Pressure', 'Cholesterol', 'Heart Diseases'],
        'plans' => [
          'title' => 'Heart Health Plans',
          'items' => [
            'Blood pressure management',
            'Cholesterol control herbs',
            'Cardiac strengthening therapies',
            'Regular heart checkups',
          ],
          'price' => '$110',
          'period' => '/Month',
        ],
        'core_values' => [
          'Heart-first approach',
          'Preventive care',
          'Lifestyle modification',
          'Compassionate support',
        ],
        'tips' => 'Exercise regularly, manage stress, and use Unani remedies for a healthy heart.',
      ],
      'gastro' => [
        'title' => 'Gastro & Digestive Diseases',
        'icon' => 'icon-heart3',
        'image' => 'assets/images/page-titles/gastro.png',
        'feature_image' => 'assets/images/page-titles/gastro.png',
        'desc' => 'पाचन तंत्र से जुड़ी सभी बीमारियों का प्राकृतिक इलाज।',
        'details' => 'यूनानी चिकित्सा आंतों की सूजन कम कर पाचन शक्ति को पुनः मजबूत बनाती है।',
        'description' => 'Natural Unani remedies for all digestive diseases, reducing inflammation and restoring digestive power.',
        'features' => ['Inflammation Reduction', 'Digestive Power Boost', 'Natural Herbs', 'Gut Health'],
        'list' => ['Ulcerative Colitis', 'Gastritis', 'GERD', 'Constipation', 'Stomach Ulcers', 'Pancreatitis'],
        'plans' => [
          'title' => 'Digestive Care Plans',
          'items' => [
            'Gut healing herbs',
            'Personalized diet plans',
            'Digestive enzyme support',
            'Monthly digestive health review',
          ],
          'price' => '$80',
          'period' => '/Month',
        ],
        'core_values' => [
          'Digestive harmony',
          'Natural healing',
          'Patient comfort',
          'Ongoing education',
        ],
        'tips' => 'Eat fiber-rich foods, avoid spicy items, and use Unani digestive tonics for best results.',
      ],
      'piles' => [
        'title' => 'Piles (Bawasir) Treatment',
        'icon' => 'icon-heart2',
        'image' => 'assets/images/page-titles/piles.jpg',
        'feature_image' => 'assets/images/page-titles/piles.jpg',
        'desc' => 'बिना ऑपरेशन बवासीर का यूनानी इलाज।',
        'details' => 'यूनानी दवाइयाँ दर्द, जलन और रक्तस्राव को जड़ से खत्म करती हैं।',
        'description' => 'Unani medicines cure pain, burning, and bleeding from piles without surgery.',
        'features' => ['No Surgery', 'Pain Relief', 'Bleeding Control', 'Natural Healing'],
        'list' => [],
        'plans' => [
          'title' => 'Piles Relief Plans',
          'items' => [
            'Non-surgical herbal treatment',
            'Pain and bleeding control',
            'Dietary fiber guidance',
            'Follow-up care',
          ],
          'price' => '$70',
          'period' => '/Month',
        ],
        'core_values' => [
          'Gentle relief',
          'Patient dignity',
          'Long-term comfort',
          'Holistic approach',
        ],
        'tips' => 'Increase fiber, stay hydrated, and use Unani medicines for piles management.',
      ],
      'sexual' => [
        'title' => 'Sexual & Infertility Treatment',
        'icon' => 'icon-dropper',
        'image' => 'assets/images/page-titles/sexual.jpg',
        'feature_image' => 'assets/images/page-titles/sexual.jpg',
        'desc' => 'गुप्त रोग और बांझपन का सुरक्षित यूनानी समाधान।',
        'details' => 'यूनानी चिकित्सा हार्मोन संतुलन सुधारकर प्राकृतिक रूप से प्रजनन क्षमता बढ़ाती है।',
        'description' => 'Safe Unani solutions for sexual and infertility problems, improving hormonal balance and reproductive health.',
        'features' => ['Hormone Balance', 'Reproductive Health', 'Safe Remedies', 'Male & Female Care'],
        'list' => ['Male & Female Infertility', 'Sexual Weakness'],
        'plans' => [
          'title' => 'Fertility & Sexual Health Plans',
          'items' => [
            'Hormone balancing herbs',
            'Fertility enhancement therapies',
            'Confidential counseling',
            'Progress tracking',
          ],
          'price' => '$130',
          'period' => '/Month',
        ],
        'core_values' => [
          'Confidentiality',
          'Empowerment',
          'Holistic wellness',
          'Respectful care',
        ],
        'tips' => 'Maintain a healthy lifestyle, avoid stress, and follow Unani advice for reproductive health.',
      ],
      'allergy' => [
        'title' => 'Allergy & Asthma',
        'icon' => 'icon-heart3',
        'image' => 'assets/images/page-titles/asthma.jpg',
        'feature_image' => 'assets/images/page-titles/asthma.jpg',
        'desc' => 'दमा और एलर्जी का स्थायी यूनानी इलाज।',
        'details' => 'हर्बल इलाज फेफड़ों को मजबूत करता है और सांस की समस्या कम करता है।',
        'description' => 'Permanent Unani treatment for asthma and allergies, strengthening lungs and reducing breathing problems.',
        'features' => ['Lung Strengthening', 'Breathing Relief', 'Herbal Solutions', 'Long-term Results'],
        'list' => [],
        'plans' => [
          'title' => 'Allergy & Asthma Plans',
          'items' => [
            'Herbal anti-allergy regimen',
            'Breathing exercises',
            'Environmental control tips',
            'Regular lung function tests',
          ],
          'price' => '$75',
          'period' => '/Month',
        ],
        'core_values' => [
          'Respiratory wellness',
          'Preventive focus',
          'Patient education',
          'Long-term relief',
        ],
        'tips' => 'Avoid allergens, use prescribed Unani medicines, and practice breathing exercises for asthma relief.',
      ],
    ];
    $key = isset($_GET['treatment']) ? strtolower($_GET['treatment']) : 'cancer';
    $data = isset($treatments[$key]) ? $treatments[$key] : $treatments['cancer'];
    ?>
    <section class="page-title page-title-layout2 bg-overlay text-center pb-0">
      <div class="bg-img"><img src="<?php echo $data['feature_image']; ?>" alt="background" style="object-fit:cover;width:100%;height:100%;max-height:350px;"></div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-2">
            <div class="pagetitle__icon">
              <i class="<?php echo $data['icon']; ?>"></i>
            </div>
            <h1 class="pagetitle__heading"><?php echo $data['title']; ?></h1>
            <p class="pagetitle__desc mb-30"><?php echo $data['desc']; ?></p>
            <a href="#content" class="scroll-down"><i class="fas fa-long-arrow-alt-down"></i></a>
          </div>
        </div>
      </div>
    </section>

    <section id="content" class=" pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="text-block mb-50">
              <h5 class="text-block__title">Description</h5>
              <p class="text-block__desc mb-20 font-weight-bold color-secondary"><?php echo $data['description']; ?></p>
              <p class="text-block__desc mb-20"><?php echo $data['details']; ?></p>
            </div>
            <?php if (!empty($data['features'])): ?>
            <div class="mb-40">
              <h5 class="text-block__title">Key Features</h5>
              <ul class="list-items list-unstyled mb-20 pl-40">
                <?php foreach ($data['features'] as $feature): ?>
                  <li><?php echo $feature; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
            <?php endif; ?>
            <?php if (!empty($data['list'])): ?>
            <ul class="list-items list-unstyled mb-60 pl-40">
              <?php foreach ($data['list'] as $item): ?>
                <li><?php echo $item; ?></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <?php if (!empty($data['plans'])): ?>
            <div class="widget-plan mb-60">
              <div class="widget__body">
                <h5 class="widget__title"><?php echo $data['plans']['title']; ?></h5>
                <div class="row">
                  <div class="col-sm-12 col-md-12">
                    <div class="plan__items">
                      <ul class="list-items list-items-layout2 list-unstyled mb-0">
                        <?php foreach ($data['plans']['items'] as $plan): ?>
                          <li><?php echo $plan; ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div><!-- /.widget__body -->
              <!-- <div class="widget__footer d-flex flex-wrap justify-content-between align-items-center">
                <div class="plan__price"><?php echo $data['plans']['price']; ?><span class="period"><?php echo $data['plans']['period']; ?></span></div>
                <div class="d-flex align-items-center">
                  <a href="#" class="btn btn__secondary btn__rounded mr-30">
                    <span>Purchase Now</span> <i class="icon-arrow-right"></i>
                  </a>
                  <a href="#" class="btn btn__primary btn__link">
                    <i class="icon-arrow-right icon-filled"></i> <span>Explore Other Plans</span>
                  </a>
                </div>
              </div> -->
              <!-- /.widget__footer -->
            </div><!-- /.widget-plan -->
            <?php endif; ?>
            <?php if (!empty($data['core_values'])): ?>
            <div class="text-block mb-50">
              <h5 class="text-block__title">Our Core Values</h5>
              <ul class="list-items list-unstyled mb-20 pl-40">
                <?php foreach ($data['core_values'] as $value): ?>
                  <li><?php echo $value; ?></li>
                <?php endforeach; ?>
              </ul>
            </div><!-- /.text-block -->
            <?php endif; ?>
            <div class="fancybox-layout1">
              <div class="row">
                <div class="col-md-6">
                  <!-- fancybox item #1 -->
                  <div class="fancybox-item d-flex">
                    <div class="fancybox__icon">
                      <i class="icon-heart"></i>
                    </div><!-- /.fancybox__icon -->
                    <div class="fancybox__content">
                      <h4 class="fancybox__title">Medical Check Ups</h4>
                      <p class="fancybox__desc">Recognised as a world renowned institution, you can consult any of our
                        doctors by visiting our clinic.</p>
                    </div><!-- /.fancybox-content -->
                  </div><!-- /.fancybox-item -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                  <!-- fancybox item #2 -->
                  <div class="fancybox-item d-flex">
                    <div class="fancybox__icon">
                      <i class="icon-doctor"></i>
                    </div><!-- /.fancybox__icon -->
                    <div class="fancybox__content">
                      <h4 class="fancybox__title">Medical Treatment</h4>
                      <p class="fancybox__desc">Free or low cost coverage adults with limited income recognised as a
                        world renowned institution.</p>
                    </div><!-- /.fancybox-content -->
                  </div><!-- /.fancybox-item -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                  <!-- fancybox item #3 -->
                  <div class="fancybox-item d-flex">
                    <div class="fancybox__icon">
                      <i class="icon-call3"></i>
                    </div><!-- /.fancybox__icon -->
                    <div class="fancybox__content">
                      <h4 class="fancybox__title">Emergency Help 24/7 </h4>
                      <p class="fancybox__desc">Contact our reception staff with any medical enquiry any time for low
                        cost coverage adults.</p>
                    </div><!-- /.fancybox-content -->
                  </div><!-- /.fancybox-item -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6">
                  <!-- fancybox item #4 -->
                  <div class="fancybox-item d-flex">
                    <div class="fancybox__icon">
                      <i class="icon-drugs"></i>
                    </div><!-- /.fancybox__icon -->
                    <div class="fancybox__content">
                      <h4 class="fancybox__title">Research Professionals </h4>
                      <p class="fancybox__desc">All medical aspects practice for family, our reception staff with any
                        medical enquiry any time.</p>
                    </div><!-- /.fancybox-content -->
                  </div><!-- /.fancybox-item -->
                </div><!-- /.col-md-6 -->
              </div><!-- /.row -->
            </div><!-- /.fancybox-layout1 -->
            <?php if (!empty($data['tips'])): ?>
            <div class="text-block mb-50">
              <h5 class="text-block__title">Health Tips & Info</h5>
              <p class="text-block__desc mb-20"><?php echo $data['tips']; ?></p>
            </div><!-- /.text-block -->
            <?php endif; ?>
            <div id="accordion" class="mb-70">
              <div class="accordion-item opened">
                <div class="accordion__header" data-toggle="collapse" data-target="#collapse3">
                  <a class="accordion__title" href="#">What Payment Methods Are Available?</a>
                </div><!-- /.accordion-item-header -->
                <div id="collapse3" class="collapse show" data-parent="#accordion">
                  <div class="accordion__body">
                    <p>With any financial product that you buy, it is important that you know you are getting the best
                      advice from a reputable company as often</p>
                  </div><!-- /.accordion-item-body -->
                </div>
              </div><!-- /.accordion-item -->
              <div class="accordion-item">
                <div class="accordion__header" data-toggle="collapse" data-target="#collapse1">
                  <a class="accordion__title" href="#">Which Plan Is Right For Me?</a>
                </div><!-- /.accordion-item-header -->
                <div id="collapse1" class="collapse" data-parent="#accordion">
                  <div class="accordion__body">
                    <p>With any financial product that you buy, it is important that you know you are getting the best
                      advice from a reputable company as often</p>
                  </div><!-- /.accordion-item-body -->
                </div>
              </div><!-- /.accordion-item -->
              <div class="accordion-item">
                <div class="accordion__header" data-toggle="collapse" data-target="#collapse2">
                  <a class="accordion__title" href="#">Do I have to commit to a contract?</a>
                </div><!-- /.accordion-item-header -->
                <div id="collapse2" class="collapse" data-parent="#accordion">
                  <div class="accordion__body">
                    <p>With any financial product that you buy, it is important that you know you are getting the best
                      advice from a reputable company as often</p>
                  </div><!-- /.accordion-item-body -->
                </div>
              </div><!-- /.accordion-item -->
              <div class="accordion-item">
                <div class="accordion__header" data-toggle="collapse" data-target="#collapse4">
                  <a class="accordion__title" href="#">What if I pick the wrong plan?</a>
                </div><!-- /.accordion-item-header -->
                <div id="collapse4" class="collapse" data-parent="#accordion">
                  <div class="accordion__body">
                    <p>With any financial product that you buy, it is important that you know you are getting the best
                      advice from a reputable company as often</p>
                  </div><!-- /.accordion-item-body -->
                </div>
              </div><!-- /.accordion-item -->
              <div class="accordion-item">
                <div class="accordion__header" data-toggle="collapse" data-target="#collapse5">
                  <a class="accordion__title" href="#">Any contracts or commitments?</a>
                </div><!-- /.accordion-item-header -->
                <div id="collapse5" class="collapse" data-parent="#accordion">
                  <div class="accordion__body">
                    <p>With any financial product that you buy, it is important that you know you are getting the best
                      advice from a reputable company as often</p>
                  </div><!-- /.accordion-item-body -->
                </div>
              </div><!-- /.accordion-item -->
            </div><!-- /#accordion -->

            
          </div><!-- /.col-lg-8 -->
          <div class="col-sm-12 col-md-12 col-lg-4">
            <aside class="sidebar has-marign-left sticky-top">
              <div class="widget widget-services">
                <h5 class="widget__title">Medical Services</h5>
                <div class="widget-content">
                  <ul class="list-unstyled mb-0">
                    <?php foreach ($treatments as $key => $service): ?>
                      <li>
                        <a href="service-details.php?treatment=<?php echo $key; ?>">
                          <span><?php echo $service['title']; ?></span><i class="icon-arrow-right"></i>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-services -->
              <div class="widget widget-help bg-overlay bg-overlay-secondary-gradient">
                <div class="bg-img"><img src="assets/images/banners/5.jpg" alt="background"></div>
                <div class="widget-content">
                  <div class="widget__icon">
                    <i class="icon-call3"></i>
                  </div>
                  <h4 class="widget__title">Emergency Cases</h4>
                  <p class="widget__desc">Please feel welcome to contact our friendly reception staff with any general
                    or medical enquiry call us.
                  </p>
                  <a href="tel:+919876543210" class="phone__number">
                    <i class="icon-phone"></i> <span>+91 9634430627</span>
                  </a>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-help -->
              <div class="widget widget-schedule">
                <div class="widget-content">
                  <div class="widget__icon">
                    <i class="icon-charity2"></i>
                  </div>
                  <h4 class="widget__title">Opening Hours</h4>
                    <ul class="time__list list-unstyled mb-0">
                      <li><span>Morning :</span> <span>10:30 am - 2:30 pm</span></li>
                      <li><span>Evening :</span> <span>5:00 pm - 6:00 pm</span></li>
                      <li><span>Saturday:</span> <span>Closed</span></li>
                    </ul>
                </div><!-- /.widget-content -->
              </div><!-- /.widget-schedule -->
              <div class="widget widget-reports">
                <a href="#" class="btn btn__primary btn__block">
                  <i class="icon-pdf-file"></i>
                  <span>2020 Patient Reports</span>
                </a>
              </div>
            </aside><!-- /.sidebar -->
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>

<?php include 'includes/footer.php';?>
