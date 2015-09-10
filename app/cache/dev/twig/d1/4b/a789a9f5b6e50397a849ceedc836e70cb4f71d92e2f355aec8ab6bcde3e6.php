<?php

/* AcmeGeneratorBundle:Default:index.html.twig */
class __TwigTemplate_d14ba789a9f5b6e50397a849ceedc836e70cb4f71d92e2f355aec8ab6bcde3e6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<head>
    <link rel=\"stylesheet\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmegenerator/css/joint.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmegenerator/css/style.css"), "html", null, true);
        echo "\" />
    <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmegenerator/css/bootstrap.css"), "html", null, true);
        echo "\" />
    <script src=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmegenerator/js/joint.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmegenerator/js/joint.shapes.devs.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmegenerator/js/bootstrap.js"), "html", null, true);
        echo "\" type=\"text/javascript\"></script>
</head>



<body>
    <h2>Code Generator v0.01</h2>
    <div class=\"papersHolder\">
        <div id=\"shapes\"class =\"papers\"></div>
        <div id=\"paper\" class =\"papers\"></div>
    </div>
</body>

<script type=\"text/javascript\">

    \$(document).bind('contextmenu', function (e) {
        e.stopPropagation();
        e.preventDefault();
        e.stopImmediatePropagation();
        return false;
    });

    var graph2_x = 15;
    var graph2_y = 10;

    var ClickableView = joint.dia.ElementView.extend({
        pointerdown: function () {
            this._click = true;
            joint.dia.ElementView.prototype.pointerdown.apply(this, arguments);
        },
        pointermove: function () {
            this._click = false;
            joint.dia.ElementView.prototype.pointermove.apply(this, arguments);
        },
        pointerup: function (evt, x, y) {
            if (this._click) {
                // triggers an event on the paper and the element itself
                this.notify('cell:click', evt, x, y);
            } else {
                joint.dia.ElementView.prototype.pointerup.apply(this, arguments);
            }
        }
    });

    var graph = new joint.dia.Graph;
    var listofobjects = [];
    var listoflinks = [];
    var _height = 30;
    var _width = 100;
    var paper = new joint.dia.Paper({
        el: \$('#paper'),
        width: 800,
        height: 1024,
        gridSize: 10,
        model: graph,
        defaultLink: new joint.dia.Link({
            attrs: {'.marker-target': {d: 'M 10 0 L 0 5 L 10 10 z'}}
        }),
        validateConnection: function (cellViewS, magnetS, cellViewT, magnetT, end, linkView) {
            // Prevent linking from input ports.
            if (magnetS && magnetS.getAttribute('type') === 'input')
                return false;
            // Prevent linking from output ports to input ports within one element.
            if (cellViewS === cellViewT)
                return false;
            // Prevent linking to input ports.
            return magnetT && magnetT.getAttribute('type') === 'input';
        },
        validateMagnet: function (cellView, magnet) {
            // Note that this is the default behaviour. Just showing it here for reference.
            // Disable linking interaction for magnets marked as passive (see below `.inPorts circle`).
            return magnet.getAttribute('magnet') !== 'passive';
        }
    });

    var graph2 = new joint.dia.Graph;
    var _height = 30;
    var _width = 100;
    var paper2 = new joint.dia.Paper({
        el: \$('#shapes'),
        width: 150,
        height: 1024,
        gridSize: 10,
        model: graph2,
        interactive: false
    });



    var basemodel = new joint.shapes.devs.Model({
        position: {x: graph2_x, y: graph2_y},
        size: {width: 90, height: 90},
        inPorts: ['in'],
        outPorts: ['out'],
        attrs: {
            '.label': {text: 'Model', 'ref-x': .4, 'ref-y': .2},
            rect: {fill: '#2ECC71'},
            text: {
                text: 'Process', fill: 'black',
                'font-size': 13, 'font-weight': 'normal'
            },
            '.inPorts circle': {fill: '#16A085', magnet: 'passive', type: 'input'},
            '.outPorts circle': {fill: '#E74C3C', type: 'output'}
        }
    });

    var m1 = basemodel.clone();
    m1.attr('.label/text', 'Proces');
    graph2.addCell(m1);

    var m2 = m1.clone();
    m2.translate(0, 150);
    graph2_y = graph2_x + 150;
    m2.attr('.label/text', 'Terminal');
    m2.attr({
        rect: {rx: 30, ry: 30, 'stroke-width': 1}
    });
    graph2.addCell(m2);

    var decisionmodel = new joint.shapes.devs.Model({
        position: {x: 15, y: 10},
        size: {width: 90, height: 90},
        inPorts: ['in'],
        outPorts: ['true', 'false'],
        attrs: {
            path: {d: 'M 30 0 L 60 30 30 60 0 30 z'},
            '.label': {text: 'Decision', fill: 'white', 'ref-x': .4, 'ref-y': .2},
            rect: {fill: 'blue', },
            text: {
                text: 'Decision', fill: 'black',
                'font-size': 13, 'font-weight': 'normal'
            },
            '.inPorts circle': {fill: '#16A085', magnet: 'passive', type: 'input'},
            '.outPorts circle': {fill: '#E74C3C', type: 'output'}
        }
    });


    var m3 = decisionmodel.clone();
    m3.translate(0, graph2_y + 150);
    graph2_y = graph2_y + 150;
    graph2.addCell(m3);

    var m4 = basemodel.clone();
    m4.translate(0, graph2_y + 150);
    m4.attr('.label/text', 'Input/Output');
    m4.attr('.label/fill', 'White');
    m4.attr({
        rect: {fill: 'red'}
    });
    graph2_y = graph2_y + 150;
    graph2.addCell(m4)


    paper.on('cell:pointerdblclick',
            function (cellView, evt, x, y) {
                ShowEditPopup();
                \$('#eventEditID').val(cellView.model.id);
                \$(\"#actionEditTitle\").val(cellView.model.attr('.label/text'));
                \$('#btnEditCancel').click(function () {
                    ClearPopupFormValues();
                    HideEditPopup();
                });
            });

    paper2.on('cell:pointerclick', function (cellView, evt, x, y) {
        ShowEventPopup();
    })

    function ShowEventPopup() {
        ClearPopupFormValues();
        \$('#popupBlockForm').show();
    }

    function ShowEditPopup() {
        ClearEditFormValues();
        \$('#popupEditForm').show();
    }

    function ClearPopupFormValues() {
        \$('#eventID').val(\"\");
        \$('#actionTitle').val(\"\");
    }

    function ClearEditFormValues() {
        \$('#eventEditID').val(\"\");
        \$('#actionEditTitle').val(\"\");
        \$('#targetid').val(\"\");
    }

    function HidePopup() {
        \$('#popupBlockForm').hide();
    }

    function HideEditPopup() {
        \$('#popupEditForm').hide();
    }

</script>

<div id=\"popupBlockForm\" class=\"modal hide\" style=\"display: none;\">
    <div class=\"modal-header\">
        <h3>Add new block</h3>
    </div>
    <div class=\"modal-body\">
        <form id=\"EventForm\" class=\"well\">
            <input id=\"eventID\">
            <label>Action</label>
            <textarea rows=\"7\" id =\"actionTitle\" ></textarea>
        </form>
    </div>
    <div class=\"modal-footer\">
        <button type=\"button\" id=\"btnPopupCancel\" data-dismiss=\"modal\" class=\"btn\">Cancel</button>
        <button type=\"button\" id=\"btnPopupAdd\" data-dismiss=\"modal\" class=\"btn btn-primary\">Add</button>
    </div>
</div>

<div id=\"popupEditForm\" class=\"modal hide\" style=\"display: none;\">
    <div class=\"modal-header\">
        <h3>Edit block</h3>
    </div>
    <div class=\"modal-body\">
        <form id=\"EventForm\" class=\"well\">
            <input id=\"eventEditID\">
            <label>Action</label>
            <textarea rows=\"7\" id =\"actionEditTitle\" ></textarea>
            <label>Next step id</label>
            <input id=\"targetid\">
        </form>
    </div>
    <div class=\"modal-footer\">
        <button type=\"button\" id=\"btnEditCancel\" data-dismiss=\"modal\" class=\"btn\">Cancel</button>
        <button type=\"button\" id=\"btnEditDelete\" data-dismiss=\"modal\" class=\"btn\">Delete</button>
        <button type=\"button\" id=\"btnEditSave\" data-dismiss=\"modal\" class=\"btn btn-primary\">Save</button>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "AcmeGeneratorBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 8,  38 => 7,  34 => 6,  30 => 5,  26 => 4,  22 => 3,  19 => 2,);
    }
}
