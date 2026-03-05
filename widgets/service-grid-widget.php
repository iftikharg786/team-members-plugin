<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Service Grid Widget.
 *
 * Elementor widget that inserts a service grid.
 *
 * @since 1.0.0
 */
class Elementor_Service_Grid_Widget extends \Elementor\Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve widget name.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'editing_services_grid';
    }

    /**
     * Get widget title.
     *
     * Retrieve widget title.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget title.
     */
    public function get_title()
    {
        return esc_html__('Services', 'editing-services-widget');
    }

    /**
     * Get widget icon.
     *
     * Retrieve widget icon.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'eicon-gallery-grid';
    }

    /**
     * Get custom help URL.
     *
     * Retrieve a URL where the user can get more information about the widget.
     *
     * @since 1.0.0
     * @access public
     * @return string Widget help URL.
     */
    public function get_custom_help_url()
    {
        return 'https://developers.elementor.com/docs/widgets/';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['general'];
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 1.0.0
     * @access public
     * @return array Widget keywords.
     */
    public function get_keywords()
    {
        return ['services', 'grid', 'editing', 'cards'];
    }

    /**
     * Register widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Header', 'editing-services-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => esc_html__('Section Title', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Editing Services', 'editing-services-widget'),
                'placeholder' => esc_html__('Type your title here', 'editing-services-widget'),
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__('Sub Heading', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => esc_html__('Optional sub-heading', 'editing-services-widget'),
            ]
        );

        $this->add_control(
            'intro_line',
            [
                'label' => esc_html__('Intro Line', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Specialist editorial support for academic research, doctoral work, and institutional publications.', 'editing-services-widget'),
                'placeholder' => esc_html__('Type your intro line here', 'editing-services-widget'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'services_section',
            [
                'label' => esc_html__('Services', 'editing-services-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_title',
            [
                'label' => esc_html__('Title', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Service Title', 'editing-services-widget'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'service_description',
            [
                'label' => esc_html__('Description', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Service description goes here.', 'editing-services-widget'),
                'show_label' => true,
            ]
        );

        $repeater->add_control(
            'service_image',
            [
                'label' => esc_html__('Choose Image', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'service_button_text',
            [
                'label' => esc_html__('Button Text', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'editing-services-widget'),
                'placeholder' => esc_html__('Type button text here', 'editing-services-widget'),
            ]
        );

        $repeater->add_control(
            'service_link',
            [
                'label' => esc_html__('Link', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'editing-services-widget'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
            ]
        );

        $this->add_control(
            'services',
            [
                'label' => esc_html__('Services List', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'service_title' => esc_html__('Journal Articles and Books', 'editing-services-widget'),
                        'service_description' => esc_html__('Submission-ready refinement for journal articles, book chapters, and scholarly monographs. We strengthen structure, argumentation, clarity, and linguistic precision while preserving the author’s voice.', 'editing-services-widget'),
                        'service_button_text' => esc_html__('Read More', 'editing-services-widget'),
                    ],
                    [
                        'service_title' => esc_html__('Doctoral and Master’s Theses', 'editing-services-widget'),
                        'service_description' => esc_html__('Comprehensive, chapter-by-chapter refinement aligned with examiner expectations and institutional standards. Structured, consistent, and defensible.', 'editing-services-widget'),
                        'service_button_text' => esc_html__('Read More', 'editing-services-widget'),
                    ],
                    [
                        'service_title' => esc_html__('Institutional and Policy Documents', 'editing-services-widget'),
                        'service_description' => esc_html__('Clear, publication-grade documents for research institutes, policy programmes, and international organisations. Precision in language, coherence in structure, and consistency with formal style requirements.', 'editing-services-widget'),
                        'service_button_text' => esc_html__('Read More', 'editing-services-widget'),
                    ],
                ],
                'title_field' => '{{{ service_title }}}',
            ]
        );

        $this->end_controls_section();

        // Styles Tab
        $this->start_controls_section(
            'style_header_section',
            [
                'label' => esc_html__('Header Style', 'editing-services-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'header_align',
            [
                'label' => esc_html__('Alignment', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .services-header' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'header_color',
            [
                'label' => esc_html__('Title Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-header h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'header_typography',
                'selector' => '{{WRAPPER}} .services-header h2',
            ]
        );

        $this->add_control(
            'intro_color',
            [
                'label' => esc_html__('Intro Line Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-header p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'intro_typography',
                'selector' => '{{WRAPPER}} .services-header p',
            ]
        );

        $this->end_controls_section();

        // Sub-heading and Divider Style
        $this->start_controls_section(
            'style_subheading_section',
            [
                'label' => esc_html__('Sub-Heading Style', 'editing-services-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'subheading_align',
            [
                'label' => esc_html__('Alignment', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => ['title' => esc_html__('Left', 'editing-services-widget'), 'icon' => 'eicon-text-align-left'],
                    'center' => ['title' => esc_html__('Center', 'editing-services-widget'), 'icon' => 'eicon-text-align-center'],
                    'right' => ['title' => esc_html__('Right', 'editing-services-widget'), 'icon' => 'eicon-text-align-right'],
                    'justify' => ['title' => esc_html__('Justify', 'editing-services-widget'), 'icon' => 'eicon-text-align-justify'],
                ],
                'default' => 'center',
                'selectors' => ['{{WRAPPER}} .services-subheading' => 'text-align: {{VALUE}};'],
            ]
        );

        $this->add_control(
            'subheading_color',
            [
                'label' => esc_html__('Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .services-subheading' => 'color: {{VALUE}};'],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subheading_typography',
                'selector' => '{{WRAPPER}} .services-subheading',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_divider_section',
            [
                'label' => esc_html__('Divider Style', 'editing-services-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'divider_color',
            [
                'label' => esc_html__('Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => ['{{WRAPPER}} .services-divider' => 'background-color: {{VALUE}}; border-color: {{VALUE}};'],
            ]
        );

        $this->add_responsive_control(
            'divider_width',
            [
                'label' => esc_html__('Width', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => ['px' => ['min' => 10, 'max' => 1200], '%' => ['min' => 1, 'max' => 100]],
                'default' => ['unit' => '%', 'size' => 30],
                'selectors' => ['{{WRAPPER}} .services-divider' => 'width: {{SIZE}}{{UNIT}};'],
            ]
        );

        $this->add_responsive_control(
            'divider_weight',
            [
                'label' => esc_html__('Weight (Height)', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => ['px' => ['min' => 1, 'max' => 20]],
                'default' => ['unit' => 'px', 'size' => 2],
                'selectors' => ['{{WRAPPER}} .services-divider' => 'height: {{SIZE}}{{UNIT}};'],
            ]
        );

        $this->add_control(
            'divider_style',
            [
                'label' => esc_html__('Style', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'solid' => esc_html__('Solid', 'editing-services-widget'),
                    'dashed' => esc_html__('Dashed', 'editing-services-widget'),
                    'dotted' => esc_html__('Dotted', 'editing-services-widget'),
                ],
                'default' => 'solid',
                'selectors' => ['{{WRAPPER}} .services-divider' => 'border-style: {{VALUE}};'],
            ]
        );

        $this->add_control(
            'divider_align',
            [
                'label' => esc_html__('Alignment', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => ['title' => esc_html__('Left', 'editing-services-widget'), 'icon' => 'eicon-text-align-left'],
                    'center' => ['title' => esc_html__('Center', 'editing-services-widget'), 'icon' => 'eicon-text-align-center'],
                    'right' => ['title' => esc_html__('Right', 'editing-services-widget'), 'icon' => 'eicon-text-align-right'],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .services-divider' => 'margin-left: auto; margin-right: auto;',
                ],
                'condition' => ['divider_align' => 'center'],
            ]
        );

        $this->add_responsive_control(
            'divider_gap',
            [
                'label' => esc_html__('Spacing', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => ['px' => ['min' => 0, 'max' => 80]],
                'default' => ['unit' => 'px', 'size' => 20],
                'selectors' => ['{{WRAPPER}} .services-divider' => 'margin-top: {{SIZE}}{{UNIT}}; margin-bottom: {{SIZE}}{{UNIT}};'],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_layout_section',
            [
                'label' => esc_html__('Layout', 'editing-services-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'columns',
            [
                'label' => esc_html__('Columns', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 6,
                'step' => 1,
                'default' => 3,
                'tablet_default' => 2,
                'mobile_default' => 1,
                'selectors' => [
                    '{{WRAPPER}} .services-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );

        $this->add_responsive_control(
            'column_gap',
            [
                'label' => esc_html__('Column Gap', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .services-grid' => 'column-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'row_gap',
            [
                'label' => esc_html__('Row Gap', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .services-grid' => 'row-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_card_section',
            [
                'label' => esc_html__('Card Style', 'editing-services-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_bg_color',
            [
                'label' => esc_html__('Background Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_padding',
            [
                'label' => esc_html__('Padding', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .service-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'card_border_radius',
            [
                'label' => esc_html__('Border Radius', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .service-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'selector' => '{{WRAPPER}} .service-card',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_hover_box_shadow',
                'label' => esc_html__('Hover Box Shadow', 'editing-services-widget'),
                'selector' => '{{WRAPPER}} .service-card:hover',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_services_text_section',
            [
                'label' => esc_html__('Services Text Style', 'editing-services-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'service_text_align',
            [
                'label' => esc_html__('Alignment', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .service-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'service_title_color',
            [
                'label' => esc_html__('Service Title Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_title_typography',
                'selector' => '{{WRAPPER}} .service-card h3',
            ]
        );

        $this->add_responsive_control(
            'service_desc_align',
            [
                'label' => esc_html__('Description Alignment', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .service-card p' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'service_desc_color',
            [
                'label' => esc_html__('Service Description Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-card p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'service_desc_typography',
                'selector' => '{{WRAPPER}} .service-card p',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_overlay_section',
            [
                'label' => esc_html__('Image Overlay Style', 'editing-services-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'overlay_bg_color',
            [
                'label' => esc_html__('Overlay Background Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.6)',
                'selectors' => [
                    '{{WRAPPER}} .service-image-container::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'overlay_align',
            [
                'label' => esc_html__('Text Alignment', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .service-overlay p' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_button_section',
            [
                'label' => esc_html__('Button Style', 'editing-services-widget'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('button_style_tabs');

        $this->start_controls_tab(
            'button_normal_tab',
            [
                'label' => esc_html__('Normal', 'editing-services-widget'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .service-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0073aa',
                'selectors' => [
                    '{{WRAPPER}} .service-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover_tab',
            [
                'label' => esc_html__('Hover', 'editing-services-widget'),
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#005177',
                'selectors' => [
                    '{{WRAPPER}} .service-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .service-btn',
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .service-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .service-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_width',
            [
                'label' => esc_html__('Button Width', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => [
                        'min' => 50,
                        'max' => 500,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .service-btn' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_align',
            [
                'label' => esc_html__('Alignment', 'editing-services-widget'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'editing-services-widget'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .service-btn' => 'align-self: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="editing-services-widget-container">

            <div class="services-header">
                <?php if (!empty($settings['section_title'])): ?>
                    <h2>
                        <?php echo esc_html($settings['section_title']); ?>
                    </h2>
                <?php endif; ?>

                <?php if (!empty($settings['sub_heading'])): ?>
                    <h3 class="services-subheading">
                        <?php echo esc_html($settings['sub_heading']); ?>
                    </h3>
                <?php endif; ?>

                <?php if (!empty($settings['intro_line'])): ?>
                    <p>
                        <?php echo wp_kses_post($settings['intro_line']); ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="services-divider"></div>

            <?php if ($settings['services']): ?>
                <div class="services-grid">
                    <?php foreach ($settings['services'] as $item): ?>
                        <div class="service-card elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">

                            <?php if (!empty($item['service_image']['url'])): ?>
                                <div class="service-image-container">
                                    <img src="<?php echo esc_url($item['service_image']['url']); ?>"
                                        alt="<?php echo esc_attr($item['service_title']); ?>">
                                    <div class="service-overlay">
                                        <?php if (!empty($item['service_description'])): ?>
                                            <p>
                                                <?php echo wp_kses_post($item['service_description']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php
                                        if (!empty($item['service_link']['url'])) {
                                            $this->add_link_attributes('service_link_' . $item['_id'], $item['service_link']);
                                            $btn_text = !empty($item['service_button_text']) ? esc_html($item['service_button_text']) : esc_html__('Read More', 'editing-services-widget');
                                            echo '<a class="service-btn" ' . $this->get_render_attribute_string('service_link_' . $item['_id']) . '>' . $btn_text . '</a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="service-content">
                                <?php if (!empty($item['service_title'])): ?>
                                    <h3>
                                        <?php echo esc_html($item['service_title']); ?>
                                    </h3>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        </div>
        <?php
    }
}
