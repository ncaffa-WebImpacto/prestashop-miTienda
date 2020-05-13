<?php
namespace BitElementor;

if ( ! defined( 'ELEMENTOR_ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Video extends Widget_Base {

    protected $_current_instance = [];

    public function get_id() {
        return 'video';
    }

    public function get_title() {
        return \BitElementorWpHelper::__( 'Video', 'elementor' );
    }

    public function get_icon() {
        return 'youtube';
    }

    protected function _register_controls() {
        $this->add_control(
            'section_video',
            [
                'label' => \BitElementorWpHelper::__( 'Video', 'elementor' ),
                'type' => Controls_Manager::SECTION,
            ]
        );

        $this->add_control(
            'video_type',
            [
                'label' => \BitElementorWpHelper::__( 'Video Type', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'default' => 'youtube',
                'options' => [
                    'youtube' => \BitElementorWpHelper::__( 'YouTube', 'elementor' ),
                    'vimeo' => \BitElementorWpHelper::__( 'Vimeo', 'elementor' ),
                    //'hosted' => \BitElementorWpHelper::__( 'HTML5 Video', 'elementor' ),
                ],
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => \BitElementorWpHelper::__( 'Link', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'section' => 'section_video',
                'placeholder' => \BitElementorWpHelper::__( 'Enter your YouTube link', 'elementor' ),
                'default' => 'https://www.youtube.com/watch?v=9uOETcuFjbE',
                'label_block' => true,
                'condition' => [
                    'video_type' => 'youtube',
                ],
            ]
        );

        $this->add_control(
            'vimeo_link',
            [
                'label' => \BitElementorWpHelper::__( 'Vimeo Link', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'section' => 'section_video',
                'placeholder' => \BitElementorWpHelper::__( 'Enter your Vimeo link', 'elementor' ),
                'default' => 'https://vimeo.com/170933924',
                'label_block' => true,
                'condition' => [
                    'video_type' => 'vimeo',
                ],
            ]
        );

        $this->add_control(
            'hosted_link',
            [
                'label' => \BitElementorWpHelper::__( 'Link', 'elementor' ),
                'type' => Controls_Manager::TEXT,
                'section' => 'section_video',
                'placeholder' => \BitElementorWpHelper::__( 'Enter your video link', 'elementor' ),
                'default' => '',
                'label_block' => true,
                'condition' => [
                    'video_type' => 'hosted',
                ],
            ]
        );

        $this->add_control(
            'aspect_ratio',
            [
                'label' => \BitElementorWpHelper::__( 'Aspect Ratio', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    '169' => '16:9',
                    '43' => '4:3',
                    '32' => '3:2',
                ],
                'default' => '169',
                'prefix_class' => 'elementor-aspect-ratio-',
            ]
        );

        $this->add_control(
            'heading_youtube',
            [
                'label' => \BitElementorWpHelper::__( 'Video Options', 'elementor' ),
                'type' => Controls_Manager::HEADING,
                'section' => 'section_video',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'in_modal',
            [
                'label' => \BitElementorWpHelper::__( 'In modal', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    'no' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                    'yes' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                ],
                'default' => 'no',
            ]
        );

        //STYLE TAB
        $this->add_control(
            'section_style',
            [
                'label' => \BitElementorWpHelper::__( 'Modal trigger', 'elementor' ),
                'type' => Controls_Manager::SECTION,
                'tab' => self::TAB_STYLE,
                'condition' => [
                    'in_modal' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'shape_size',
            [
                'label' => \BitElementorWpHelper::__( 'Shape height', 'elementor' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 80,
                ],
                'range' => [
                    'px' => [
                        'min' => 16,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-video-open-modal i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'tab' => self::TAB_STYLE,
                'section' => 'section_style',
            ]
        );

        $this->add_control(
            'modal_play_color',
            [
                'label' => \BitElementorWpHelper::__( 'Play Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'tab' => self::TAB_STYLE,
                'section' => 'section_style',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .elementor-video-open-modal' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'in_modal' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'modal_play_align',
            [
                'label' => \BitElementorWpHelper::__( 'Alignment', 'elementor' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => \BitElementorWpHelper::__( 'Left', 'elementor' ),
                        'icon' => 'align-left',
                    ],
                    'center' => [
                        'title' => \BitElementorWpHelper::__( 'Center', 'elementor' ),
                        'icon' => 'align-center',
                    ],
                    'right' => [
                        'title' => \BitElementorWpHelper::__( 'Right', 'elementor' ),
                        'icon' => 'align-right',
                    ],
                ],
                'default' => 'center',
                'tab' => self::TAB_STYLE,
                'section' => 'section_style',
                'condition' => [
                    'in_modal' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        // YouTube
        $this->add_control(
            'yt_autoplay',
            [
                'label' => \BitElementorWpHelper::__( 'Autoplay', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    'no' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                    'yes' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                ],
                'condition' => [
                    'video_type' => 'youtube',
                ],
                'default' => 'no',
            ]
        );


        $this->add_control(
            'yt_loop',
            [
                'label' => \BitElementorWpHelper::__( 'Loop', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    'no' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                    'yes' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                ],
                'condition' => [
                    'video_type' => 'youtube',
                ],
                'default' => 'no',
            ]
        );

        $this->add_control(
            'yt_rel',
            [
                'label' => \BitElementorWpHelper::__( 'Suggested Videos', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    'no' => \BitElementorWpHelper::__( 'Hide', 'elementor' ),
                    'yes' => \BitElementorWpHelper::__( 'Show', 'elementor' ),
                ],
                'default' => 'no',
                'condition' => [
                    'video_type' => 'youtube',
                ],
            ]
        );

        $this->add_control(
            'yt_controls',
            [
                'label' => \BitElementorWpHelper::__( 'Player Control', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    'yes' => \BitElementorWpHelper::__( 'Show', 'elementor' ),
                    'no' => \BitElementorWpHelper::__( 'Hide', 'elementor' ),
                ],
                'default' => 'yes',
                'condition' => [
                    'video_type' => 'youtube',
                ],
            ]
        );

        $this->add_control(
            'yt_showinfo',
            [
                'label' => \BitElementorWpHelper::__( 'Player Title & Actions', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    'yes' => \BitElementorWpHelper::__( 'Show', 'elementor' ),
                    'no' => \BitElementorWpHelper::__( 'Hide', 'elementor' ),
                ],
                'default' => 'yes',
                'condition' => [
                    'video_type' => 'youtube',
                ],
            ]
        );

        // Vimeo
        $this->add_control(
            'vimeo_autoplay',
            [
                'label' => \BitElementorWpHelper::__( 'Autoplay', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    'no' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                    'yes' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                ],
                'default' => 'no',
                'condition' => [
                    'video_type' => 'vimeo',
                ],
            ]
        );

        $this->add_control(
            'vimeo_loop',
            [
                'label' => \BitElementorWpHelper::__( 'Loop', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    'no' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                    'yes' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                ],
                'default' => 'no',
                'condition' => [
                    'video_type' => 'vimeo',
                ],
            ]
        );

        $this->add_control(
            'vimeo_title',
            [
                'label' => \BitElementorWpHelper::__( 'Intro Title', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    'yes' => \BitElementorWpHelper::__( 'Show', 'elementor' ),
                    'no' => \BitElementorWpHelper::__( 'Hide', 'elementor' ),
                ],
                'default' => 'yes',
                'condition' => [
                    'video_type' => 'vimeo',
                ],
            ]
        );

        $this->add_control(
            'vimeo_portrait',
            [
                'label' => \BitElementorWpHelper::__( 'Intro Portrait', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    'yes' => \BitElementorWpHelper::__( 'Show', 'elementor' ),
                    'no' => \BitElementorWpHelper::__( 'Hide', 'elementor' ),
                ],
                'default' => 'yes',
                'condition' => [
                    'video_type' => 'vimeo',
                ],
            ]
        );

        $this->add_control(
            'vimeo_byline',
            [
                'label' => \BitElementorWpHelper::__( 'Intro Byline', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'section' => 'section_video',
                'options' => [
                    'yes' => \BitElementorWpHelper::__( 'Show', 'elementor' ),
                    'no' => \BitElementorWpHelper::__( 'Hide', 'elementor' ),
                ],
                'default' => 'yes',
                'condition' => [
                    'video_type' => 'vimeo',
                ],
            ]
        );

        $this->add_control(
            'vimeo_color',
            [
                'label' => \BitElementorWpHelper::__( 'Controls Color', 'elementor' ),
                'type' => Controls_Manager::COLOR,
                'section' => 'section_video',
                'default' => '',
                'condition' => [
                    'video_type' => 'vimeo',
                ],
            ]
        );

        $this->add_control(
            'view',
            [
                'label' => \BitElementorWpHelper::__( 'View', 'elementor' ),
                'type' => Controls_Manager::HIDDEN,
                'section' => 'section_video',
                'default' => 'youtube',
            ]
        );

        $this->add_control(
            'section_image_overlay',
            [
                'label' => \BitElementorWpHelper::__( 'Image Overlay', 'elementor' ),
                'type' => Controls_Manager::SECTION,
                'condition' => [
                    'in_modal' => 'no',
                ],
            ]
        );

        $this->add_control(
            'show_image_overlay',
            [
                'label' => \BitElementorWpHelper::__( 'Image Overlay', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'no',
                'options' => [
                    'no' => \BitElementorWpHelper::__( 'Hide', 'elementor' ),
                    'yes' => \BitElementorWpHelper::__( 'Show', 'elementor' ),
                ],
                'condition' => [
                    'in_modal' => 'no',
                ],
                'section' => 'section_image_overlay',
            ]
        );

        $this->add_control(
            'image_overlay',
            [
                'label' => \BitElementorWpHelper::__( 'Image', 'elementor' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => UtilsElementor::get_placeholder_image_src(),
                ],
                'section' => 'section_image_overlay',
                'condition' => [
                    'show_image_overlay' => 'yes',
                    'in_modal' => 'no',
                ],
            ]
        );

        $this->add_control(
            'show_play_icon',
            [
                'label' => \BitElementorWpHelper::__( 'Play Icon', 'elementor' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'yes',
                'options' => [
                    'yes' => \BitElementorWpHelper::__( 'Yes', 'elementor' ),
                    'no' => \BitElementorWpHelper::__( 'No', 'elementor' ),
                ],
                'section' => 'section_image_overlay',
                'condition' => [
                    'show_image_overlay' => 'yes',
                    'image_overlay[url]!' => '',
                ],
            ]
        );
    }

    protected function render( $instance = [] ) {
        $this->_current_instance = $instance;

        if ( 'hosted' !== $instance['video_type'] ) {
            $video_link = 'youtube' === $instance['video_type'] ? $instance['link'] : $instance['vimeo_link'];
            if ( empty( $video_link ) )
                return;
            $video_html = $this->videoParser($video_link, $this->get_embed_settings());
        }


        if ( $video_html ) : ?>
            <?php if (  $instance['in_modal'] === 'yes' ) : ?>

                <button class="elementor-video-open-modal" data-toggle="modal"
                     data-target="#elementor-video-modal-<?php echo (isset($instance['id_widget_instance']) ? $instance['id_widget_instance'] : '')
                     ?>">
                    <i class="fa fa-play-circle"></i>
                </button>


                <div class="modal fade elementor-video-modal" id="elementor-video-modal-<?php echo (isset($instance['id_widget_instance']) ? $instance['id_widget_instance'] : '')
                ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <span class="modal-title"></span>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo $video_html; ?>
                            </div>
                        </div>
                    </div>
                </div>


            <?php else : ?>
            <div class="elementor-video-wrapper">
                <?php
                echo $video_html;

                if ( $this->has_image_overlay() ) : ?>
                    <div class="elementor-custom-embed-image-overlay" style="background-image: url(<?php echo $this->_current_instance['image_overlay']['url']; ?>);">
                        <?php if ( 'yes' === $this->_current_instance['show_play_icon'] ) : ?>
                            <div class="elementor-custom-embed-play">
                                <i class="fa fa-play-circle"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; endif;

    }

    protected function videoParser($url, $settings, $wdth = 320, $hth = 320)
    {
        $params = '';
        if (strpos($url, 'youtube.com') !== FALSE) {
            $step1 = explode('v=', $url);
            $step2 = explode('&amp;', $step1[1]);

            if (isset($settings['autoplay']) && $settings['autoplay']) {
                $params .= '?autoplay=1';
            }
            else {
                $params .= '?autoplay=0';
            }
            if ($settings['loop']) {
                $params .= '&loop=1 &playlist='.$step2[0];
            }
            if (!$settings['rel']) {
                $params .= '&rel=0';
            }
            if (!$settings['controls']) {
                $params .= '&controls=0';
            }
            if (!$settings['showinfo']) {
                $params .= '&showinfo=0';
            }

            $iframe = '<iframe width="' . $wdth . '" height="' . $hth . '" src="https://www.youtube.com/embed/' . $step2[0] . $params . '" frameborder="0" allowfullscreen></iframe>';

        } else if (strpos($url, 'vimeo') !== FALSE) {
            if (isset($settings['autoplay']) && $settings['autoplay']) {
                $params .= '?autoplay=1';
            }
            else {
                $params .= '?autoplay=0';
            }
            if ($settings['loop']) {
                $params .= '&loop=1';
            }
            if (!$settings['title']) {
                $params .= '&title=0';
            }
            if (!$settings['portrait']) {
                $params .= '&portrait=0';
            }
            if (!$settings['byline']) {
                $params .= '&byline=0';
            }
            if ($settings['color'] != '') {
                $params .= '&color='.$settings['color'];
            }
            $id = preg_replace("/[^\/]+[^0-9]|(\/)/", "", rtrim($url, "/"));
            $embedurl = "https://player.vimeo.com/video/" . $id;
            $iframe = '<iframe src="'.$embedurl.$params .'"  width="' . $wdth . '" height="' . $hth . '"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        }
        return $iframe;
    }


    public function get_embed_settings() {
        $params = [];

        if ( 'youtube' === $this->_current_instance['video_type'] ) {
            $youtube_options = [ 'autoplay', 'loop', 'rel', 'controls', 'showinfo' ];

            foreach ( $youtube_options as $option ) {
                if ( 'autoplay' === $option && $this->allow_autoplay() )
                    continue;

                $value = ( 'yes' === $this->_current_instance[ 'yt_' . $option ] ) ? '1' : '0';
                $params[ $option ] = $value;
            }

            $params['wmode'] = 'opaque';
        }

        if ( 'vimeo' === $this->_current_instance['video_type'] ) {
            $vimeo_options = [ 'autoplay', 'loop', 'title', 'portrait', 'byline' ];

            foreach ( $vimeo_options as $option ) {
                if ( 'autoplay' === $option && $this->allow_autoplay() )
                    continue;

                $value = ( 'yes' === $this->_current_instance[ 'vimeo_' . $option ] ) ? '1' : '0';
                $params[ $option ] = $value;
            }

            $params['color'] = str_replace( '#', '', $this->_current_instance['vimeo_color'] );
            $params['autopause'] = '0';
        }

         return $params;
    }

    protected function allow_autoplay() {
        return ! empty( $this->_current_instance['image_overlay']['url'] ) && 'yes' === $this->_current_instance['show_image_overlay'] || ('yes' === $this->_current_instance['in_modal']);
    }

    protected function has_image_overlay() {
        return ! empty( $this->_current_instance['image_overlay']['url'] ) && 'yes' === $this->_current_instance['show_image_overlay'];
    }

    protected function content_template() {}
}
