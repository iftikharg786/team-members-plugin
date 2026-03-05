<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor Team Members Widget.
 *
 * Elementor widget that inserts a team members grid.
 *
 * @since 1.0.0
 */
class Elementor_Team_Members_Widget extends \Elementor\Widget_Base
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
        return 'team_members_grid';
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
        return esc_html__('Team Members', 'team-members');
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
        return ['team', 'members', 'grid', 'cards', 'people'];
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
                'label' => esc_html__('Header', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => esc_html__('Section Title', 'team-members'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Our Team', 'team-members'),
                'placeholder' => esc_html__('Type your title here', 'team-members'),
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__('Sub Heading', 'team-members'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '',
                'placeholder' => esc_html__('Optional sub-heading', 'team-members'),
            ]
        );

        $this->add_control(
            'intro_line',
            [
                'label' => esc_html__('Intro Line', 'team-members'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Meet the dedicated professionals behind our success.', 'team-members'),
                'placeholder' => esc_html__('Type your intro line here', 'team-members'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'team_members_section',
            [
                'label' => esc_html__('Team Members', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'member_name',
            [
                'label' => esc_html__('Name', 'team-members'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Member Name', 'team-members'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'member_designation',
            [
                'label' => esc_html__('Designation/Role', 'team-members'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Founder', 'team-members'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'member_role',
            [
                'label' => esc_html__('Biography', 'team-members'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Member biography goes here.', 'team-members'),
                'show_label' => true,
            ]
        );


        $repeater->add_control(
            'member_image',
            [
                'label' => esc_html__('Choose Image', 'team-members'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'member_button_text',
            [
                'label' => esc_html__('Button Text', 'team-members'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('View Profile', 'team-members'),
                'placeholder' => esc_html__('Type button text here', 'team-members'),
            ]
        );

        $repeater->add_control(
            'member_link',
            [
                'label' => esc_html__('Link', 'team-members'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'team-members'),
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    'custom_attributes' => '',
                ],
            ]
        );

        $this->add_control(
            'team_members',
            [
                'label' => esc_html__('Team Members List', 'team-members'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => esc_html__('David McArdle', 'team-members'),
                        'member_designation' => esc_html__('Founder & Executive Director', 'team-members'),
                        'member_role' => esc_html__('David established ALBA in 2010 to provide high-level editorial and strategic publication support globally. He combines rigorous academic training with over a decade and a half of continuous editorial leadership.', 'team-members'),
                        'member_button_text' => esc_html__('View Profile', 'team-members'),
                    ],
                    [
                        'member_name' => esc_html__('Gulzhan Karibayeva', 'team-members'),
                        'member_designation' => esc_html__('Director of Academic Outreach (Central Asia & Middle East)', 'team-members'),
                        'member_role' => esc_html__('Gulzhan leads ALBA’s outreach, building trusted relationships with universities and research institutes, with a particular focus on supporting female academics.', 'team-members'),
                        'member_button_text' => esc_html__('View Profile', 'team-members'),
                    ],
                    [
                        'member_name' => esc_html__('Aidana Zhaishylyk', 'team-members'),
                        'member_designation' => esc_html__('Head of Strategic Development & Asia Partnerships', 'team-members'),
                        'member_role' => esc_html__('Aidana leads marketing strategy and institutional development across Asia, currently as a PhD candidate in Public Administration with extensive research coordination experience.', 'team-members'),
                        'member_button_text' => esc_html__('View Profile', 'team-members'),
                    ],
                    [
                        'member_name' => esc_html__('Christopher Jack', 'team-members'),
                        'member_designation' => esc_html__('Operations and Administration Manager', 'team-members'),
                        'member_role' => esc_html__('Christopher oversees operational functions, ensuring professional and efficient internal systems. He brings analytical precision to ALBA’s financial and organisational processes.', 'team-members'),
                        'member_button_text' => esc_html__('View Profile', 'team-members'),
                    ],

                ],

                'title_field' => '{{{ member_name }}}',
            ]
        );

        $this->end_controls_section();

        // Styles Tab
        $this->start_controls_section(
            'style_header_section',
            [
                'label' => esc_html__('Header Style', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'header_align',
            [
                'label' => esc_html__('Alignment', 'team-members'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'team-members'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'team-members'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'team-members'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'team-members'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .team-header' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'header_color',
            [
                'label' => esc_html__('Title Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-header h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'header_typography',
                'selector' => '{{WRAPPER}} .team-header h2',
            ]
        );

        $this->add_control(
            'intro_color',
            [
                'label' => esc_html__('Intro Line Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-header p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'intro_typography',
                'selector' => '{{WRAPPER}} .team-header p',
            ]
        );

        $this->add_responsive_control(
            'header_padding',
            [
                'label' => esc_html__('Padding', 'team-members'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .team-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'header_margin',
            [
                'label' => esc_html__('Margin', 'team-members'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .team-header' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        // Sub-heading and Divider Style
        $this->start_controls_section(
            'style_subheading_section',
            [
                'label' => esc_html__('Sub-Heading Style', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'subheading_align',
            [
                'label' => esc_html__('Alignment', 'team-members'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => ['title' => esc_html__('Left', 'team-members'), 'icon' => 'eicon-text-align-left'],
                    'center' => ['title' => esc_html__('Center', 'team-members'), 'icon' => 'eicon-text-align-center'],
                    'right' => ['title' => esc_html__('Right', 'team-members'), 'icon' => 'eicon-text-align-right'],
                    'justify' => ['title' => esc_html__('Justify', 'team-members'), 'icon' => 'eicon-text-align-justify'],
                ],
                'default' => 'center',
                'selectors' => ['{{WRAPPER}} .team-subheading' => 'text-align: {{VALUE}};'],
            ]
        );

        $this->add_control(
            'subheading_color',
            [
                'label' => esc_html__('Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => ['{{WRAPPER}} .team-subheading' => 'color: {{VALUE}};'],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subheading_typography',
                'selector' => '{{WRAPPER}} .team-subheading',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_divider_section',
            [
                'label' => esc_html__('Divider Style', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'show_divider',
            [
                'label' => esc_html__('Show Divider', 'team-members'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'team-members'),
                'label_off' => esc_html__('Hide', 'team-members'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'divider_color',
            [
                'label' => esc_html__('Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#cccccc',
                'selectors' => ['{{WRAPPER}} .team-divider' => 'background-color: {{VALUE}}; border-color: {{VALUE}};'],
                'condition' => [
                    'show_divider' => 'yes',
                ],
            ]
        );


        $this->add_responsive_control(
            'divider_width',
            [
                'label' => esc_html__('Width', 'team-members'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => ['min' => 10, 'max' => 1200],
                    '%' => ['min' => 1, 'max' => 100],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-divider' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_divider' => 'yes',
                ],
            ]
        );


        $this->add_responsive_control(
            'divider_height',
            [
                'label' => esc_html__('Weight (Thickness)', 'team-members'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => ['min' => 1, 'max' => 20],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 4,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-divider' => 'height: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'show_divider' => 'yes',
                ],
            ]
        );


        $this->add_responsive_control(
            'divider_align',
            [
                'label' => esc_html__('Alignment', 'team-members'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'team-members'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'team-members'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'team-members'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'prefix_class' => 'elementor-align-',
                'selectors' => [
                    '{{WRAPPER}} .team-divider' => 'margin-left: {{VALUE === "center" ? "auto" : (VALUE === "right" ? "auto" : "0")}}; margin-right: {{VALUE === "center" ? "auto" : (VALUE === "left" ? "auto" : "0")}};',
                ],
                'condition' => [
                    'show_divider' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'divider_margin',
            [
                'label' => esc_html__('Spacing (Margin)', 'team-members'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'default' => [
                    'top' => '10',
                    'bottom' => '15',
                    'left' => '0',
                    'right' => '0',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-divider' => 'margin-top: {{TOP}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
                ],
                'condition' => [
                    'show_divider' => 'yes',
                ],
            ]
        );



        $this->add_control(
            'divider_style',
            [
                'label' => esc_html__('Style', 'team-members'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'solid' => esc_html__('Solid', 'team-members'),
                    'dashed' => esc_html__('Dashed', 'team-members'),
                    'dotted' => esc_html__('Dotted', 'team-members'),
                ],
                'default' => 'solid',
                'selectors' => ['{{WRAPPER}} .team-divider' => 'border-style: {{VALUE}};'],
            ]
        );

        $this->add_control(
            'divider_align',
            [
                'label' => esc_html__('Alignment', 'team-members'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => ['title' => esc_html__('Left', 'team-members'), 'icon' => 'eicon-text-align-left'],
                    'center' => ['title' => esc_html__('Center', 'team-members'), 'icon' => 'eicon-text-align-center'],
                    'right' => ['title' => esc_html__('Right', 'team-members'), 'icon' => 'eicon-text-align-right'],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .team-divider' => 'margin-left: auto; margin-right: auto;',
                ],
                'condition' => ['divider_align' => 'center'],
            ]
        );

        $this->add_responsive_control(
            'divider_gap',
            [
                'label' => esc_html__('Spacing', 'team-members'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => ['px' => ['min' => 0, 'max' => 80]],
                'default' => ['unit' => 'px', 'size' => 20],
                'selectors' => ['{{WRAPPER}} .team-divider' => 'margin-top: {{SIZE}}{{UNIT}}; margin-bottom: {{SIZE}}{{UNIT}};'],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_layout_section',
            [
                'label' => esc_html__('Layout', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'columns',
            [
                'label' => esc_html__('Columns', 'team-members'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                ],
                'default' => '3',
                'tablet_default' => '2',
                'mobile_default' => '1',
                'selectors' => [
                    '{{WRAPPER}} .team-grid' => 'grid-template-columns: repeat({{VALUE}}, 1fr);',
                ],
            ]
        );


        $this->add_responsive_control(
            'column_gap',
            [
                'label' => esc_html__('Column Gap', 'team-members'),
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
                    '{{WRAPPER}} .team-grid' => 'column-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'row_gap',
            [
                'label' => esc_html__('Row Gap', 'team-members'),
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
                    '{{WRAPPER}} .team-grid' => 'row-gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_card_section',
            [
                'label' => esc_html__('Card Style', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'card_margin',
            [
                'label' => esc_html__('Margin', 'team-members'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .team-member-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('card_style_tabs');

        $this->start_controls_tab(
            'card_normal_tab',
            [
                'label' => esc_html__('Normal', 'team-members'),
            ]
        );

        $this->add_control(
            'card_bg_color',
            [
                'label' => esc_html__('Background Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-card' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'selector' => '{{WRAPPER}} .team-member-card',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_box_shadow',
                'selector' => '{{WRAPPER}} .team-member-card',
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'card_hover_tab',
            [
                'label' => esc_html__('Hover', 'team-members'),
            ]
        );

        $this->add_control(
            'card_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-card:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'card_hover_border',
                'selector' => '{{WRAPPER}} .team-member-card:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'card_hover_box_shadow',
                'selector' => '{{WRAPPER}} .team-member-card:hover',
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'style_member_image_section',
            [
                'label' => esc_html__('Member Image Style', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'member_image_width',
            [
                'label' => esc_html__('Width', 'team-members'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'vw'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 500],
                    '%' => ['min' => 0, 'max' => 100],
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-member-image-container img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_image_height',
            [
                'label' => esc_html__('Height', 'team-members'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', 'vh'],
                'range' => [
                    'px' => ['min' => 0, 'max' => 500],
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-member-image-container img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'member_image_object_fit',
            [
                'label' => esc_html__('Object Fit', 'team-members'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__('Default', 'team-members'),
                    'fill' => esc_html__('Fill', 'team-members'),
                    'cover' => esc_html__('Cover', 'team-members'),
                    'contain' => esc_html__('Contain', 'team-members'),
                ],
                'default' => 'cover',
                'selectors' => [
                    '{{WRAPPER}} .team-member-image-container img' => 'object-fit: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'team-members'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .team-member-image-container, {{WRAPPER}} .team-member-image-container img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'member_image_border',
                'selector' => '{{WRAPPER}} .team-member-image-container',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'member_image_box_shadow',
                'selector' => '{{WRAPPER}} .team-member-image-container',
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            'style_member_text_section',
            [
                'label' => esc_html__('Member Text Style', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'member_text_align',
            [
                'label' => esc_html__('Alignment', 'team-members'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'team-members'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'team-members'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'team-members'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'team-members'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .team-member-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_name_color',
            [
                'label' => esc_html__('Member Name Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-card h3' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'member_name_typography',
                'selector' => '{{WRAPPER}} .team-member-card h3',
            ]
        );

        $this->add_responsive_control(
            'member_name_margin',
            [
                'label' => esc_html__('Margin', 'team-members'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .team-member-card h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_member_designation_section',
            [
                'label' => esc_html__('Member Designation Style', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'member_designation_color',
            [
                'label' => esc_html__('Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-designation' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'member_designation_typography',
                'selector' => '{{WRAPPER}} .team-member-designation',
            ]
        );

        $this->add_responsive_control(
            'member_designation_margin',
            [
                'label' => esc_html__('Margin', 'team-members'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .team-member-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'member_designation_align',
            [
                'label' => esc_html__('Alignment', 'team-members'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'team-members'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'team-members'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'team-members'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-member-designation' => 'text-align: {{VALUE}};',
                ],
            ]
        );



        $this->add_responsive_control(
            'member_bio_align',
            [
                'label' => esc_html__('Bio Alignment', 'team-members'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'team-members'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'team-members'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'team-members'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'team-members'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .team-member-card p' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'member_bio_color',
            [
                'label' => esc_html__('Member Bio Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-card p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'member_bio_typography',
                'selector' => '{{WRAPPER}} .team-member-card p',
            ]
        );

        $this->add_responsive_control(
            'member_bio_margin',
            [
                'label' => esc_html__('Margin', 'team-members'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .team-member-card p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'style_overlay_section',
            [
                'label' => esc_html__('Image Overlay Style', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'overlay_bg_color',
            [
                'label' => esc_html__('Overlay Background Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.6)',
                'selectors' => [
                    '{{WRAPPER}} .team-member-image-container::before' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'overlay_align',
            [
                'label' => esc_html__('Text Alignment', 'team-members'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'team-members'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'team-members'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'team-members'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'team-members'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .team-member-overlay p' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'style_button_section',
            [
                'label' => esc_html__('Button Style', 'team-members'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('button_style_tabs');

        $this->start_controls_tab(
            'button_normal_tab',
            [
                'label' => esc_html__('Normal', 'team-members'),
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .team-member-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => esc_html__('Background Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#0073aa',
                'selectors' => [
                    '{{WRAPPER}} .team-member-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .team-member-btn',
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Padding', 'team-members'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .team-member-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover_tab',
            [
                'label' => esc_html__('Hover', 'team-members'),
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => esc_html__('Text Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-member-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => esc_html__('Background Color', 'team-members'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#005177',
                'selectors' => [
                    '{{WRAPPER}} .team-member-btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'team-members'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem'],
                'selectors' => [
                    '{{WRAPPER}} .team-member-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_width',
            [
                'label' => esc_html__('Button Width', 'team-members'),
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
                    '{{WRAPPER}} .team-member-btn' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_align',
            [
                'label' => esc_html__('Alignment', 'team-members'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__('Left', 'team-members'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'team-members'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__('Right', 'team-members'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .team-member-btn' => 'align-self: {{VALUE}};',
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
        <div class="team-members-widget-container">

            <div class="team-header">
                <?php if (!empty($settings['section_title'])): ?>
                    <h2>
                        <?php echo esc_html($settings['section_title']); ?>
                    </h2>
                <?php endif; ?>

                <?php if ('yes' === $settings['show_divider']): ?>
                    <div class="team-divider"></div>
                <?php endif; ?>

                <?php if (!empty($settings['sub_heading'])): ?>
                    <h3 class="team-subheading">
                        <?php echo esc_html($settings['sub_heading']); ?>
                    </h3>
                <?php endif; ?>

                <?php if (!empty($settings['intro_line'])): ?>
                    <p>
                        <?php echo wp_kses_post($settings['intro_line']); ?>
                    </p>
                <?php endif; ?>
            </div>


            <?php if ($settings['team_members']): ?>
                <div class="team-grid">
                    <?php foreach ($settings['team_members'] as $item): ?>
                        <div class="team-member-card elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>">

                            <?php if (!empty($item['member_image']['url'])): ?>
                                <div class="team-member-image-container">
                                    <img src="<?php echo esc_url($item['member_image']['url']); ?>"
                                        alt="<?php echo esc_attr($item['member_name']); ?>">
                                    <div class="team-member-overlay">
                                        <?php if (!empty($item['member_role'])): ?>
                                            <p>
                                                <?php echo wp_kses_post($item['member_role']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php
                                        if (!empty($item['member_link']['url'])) {
                                            $this->add_link_attributes('member_link_' . $item['_id'], $item['member_link']);
                                            $btn_text = !empty($item['member_button_text']) ? esc_html($item['member_button_text']) : esc_html__('View Profile', 'team-members');
                                            echo '<a class="team-member-btn" ' . $this->get_render_attribute_string('member_link_' . $item['_id']) . '>' . $btn_text . '</a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="team-member-content">
                                <?php if (!empty($item['member_name'])): ?>
                                    <h3>
                                        <?php echo esc_html($item['member_name']); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if (!empty($item['member_designation'])): ?>
                                    <div class="team-member-designation">
                                        <?php echo esc_html($item['member_designation']); ?>
                                    </div>
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
