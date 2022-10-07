var treeQuyen= $.ui.fancytree.getTree("#tree_Quyen");
var treeNguoDung=$.ui.fancytree.getTree("#treeData_NguoiDung");

$("#tree_Quyen").fancytree({
    checkbox: true,
    icon:false,
    selectMode: 3,
    autoScroll: true,
    quicksearch: true,
    extensions: ["filter"],
    filter: {
        autoExpand:true,
        leavesOnly:false,
        mode:'hide',
        highlight: false
    },
});
$("#treeData_NguoiDung").fancytree({
    checkbox: true,
    icon:false,
    selectMode: 3,
    autoScroll: true,
    quicksearch: true,
    extensions: ["filter"],
    filter: {
        autoExpand:true,
        leavesOnly:false,
        mode:'hide',
        highlight: false
    },
});

$("#tim_taiKhoan").keyup(function(e){
    var n,
    opts = {
        autoExpand:true,
        leavesOnly:true
    },
    match = $(this).val();
    // Pass a string to perform case insensitive matching
    $.ui.fancytree.getTree("#treeData_NguoiDung").filterNodes(match, opts);
    if(e && e.which === $.ui.keyCode.ESCAPE || $.trim(match) === ""){
        $.ui.fancytree.getTree("#treeData_NguoiDung").clearFilter();
        return;
    }
}).focus();

$("#tim_Quyen").keyup(function(e){
    var n,
    opts = {
        autoExpand:true,
        leavesOnly:true
    },
    match = $(this).val();
    // Pass a string to perform case insensitive matching
    treeQuyen.filterNodes(match, opts);
    if(e && e.which === $.ui.keyCode.ESCAPE || $.trim(match) === ""){
        $.ui.fancytree.getTree("#tree_Quyen").clearFilter();
        return;
    }
}).focus();

function fancytree_checkTreeQuyen(listQuyen,tree) {
    treeQuyen.visit(function(node){
        node.setSelected(false);
        if(listQuyen.includes(parseInt(node.key))){
            node.setSelected(true);
            node.parent.setExpanded();
            //node.parent.parent.setExpanded();
        }
        
    });
};

function fancytree_checkTreeNguoiDung(listNguoiDung) {
    treeNguoDung.visit(function(node){
        node.setSelected(false);
        if(listNguoiDung.includes(parseInt(node.key))){
            node.setSelected(true);
            node.parent.setExpanded();
            node.parent.parent.setExpanded();
        }
        
    });
};

function get_treeQuyen_selected_node()
{
    const selectNode = treeQuyen.getSelectedNodes();
    var NodeIDArray=[];
    $.each(selectNode, function( index, value ) {
        if(value.key != '0')
        {
            NodeIDArray.push(value.key);
        }
        
    });
    return NodeIDArray;
}

function get_treeNguoiDung_selected_node()
{
    const selectNode = treeNguoDung.getSelectedNodes();
    var NodeIDArray=[];
    $.each(selectNode, function( index, value ) {
        if(value.key != '0')
        {
            NodeIDArray.push(value.key);
        }
        
    });
    return NodeIDArray;
}