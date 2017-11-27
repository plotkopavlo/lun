
import * as THREE from 'three';
import {TweenMax, Power2, TimelineLite} from "gsap";
// import  vertexShader from './vertexShader';
// import  fragmentShader from './fragmentShader.txt';
var fragmentShader=require('./fragmentShader.html');
var vertexShader=require('./vertexShader.html');

var container;
var camera, scene, renderer;
var uniforms;
var mouse = {x:0, y:0};
var loader = new THREE.TextureLoader();

document.onmousemove = getMouseXY;

function getMouseXY(e) {
    mouse.x = e.pageX;
    mouse.y = e.pageY;
    uniforms.u_mouse.value.x = mouse.x;
    uniforms.u_mouse.value.y = mouse.y;
}
loaderPromise( "img/main.jpg")
    .then((MyTexture)=>{
        return init(MyTexture);
    })
    .then(()=>{
    animate()
}).catch((error)=>{
    console.log(error);
    return error;
});


function init(MyTexture) {

    console.log('yes');
    container = document.getElementById( 'container' );
    camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.z = 1;
    scene = new THREE.Scene();
    var geometry = new THREE.PlaneBufferGeometry( 2, 2 );


    uniforms = {
        u_time: { type: "f", value: 1.0 },
        u_animation: { type: "f", value: 0.0 },
        u_mouse: { type: "v2", value: new THREE.Vector2() },
        u_resolution: { type: "v2", value: new THREE.Vector2() },
        u_size: {type:"v2",value: new THREE.Vector2( MyTexture.image.width, MyTexture.image.height ) },
        texture: {value:MyTexture },
        map1: {value:loader.load( "img/1.jpg" ) },
        map2: {value:loader.load( "img/2.jpg" ) }
    };

    var material = new THREE.ShaderMaterial( {
        uniforms: uniforms,
        vertexShader: vertexShader,
        fragmentShader: fragmentShader
    } );
    console.log(material);
    var mesh = new THREE.Mesh( geometry, material );
    scene.add( mesh );
    renderer = new THREE.WebGLRenderer();
    renderer.setPixelRatio( window.devicePixelRatio );
    renderer.setSize( MyTexture.image.width/2, MyTexture.image.height/2 );
    container.appendChild( renderer.domElement );
    onWindowResize();
    window.addEventListener( 'resize', onWindowResize, false );
    return Promise.resolve();
}
function onWindowResize( event ) {
    // renderer.setSize( window.innerWidth, window.innerHeight );
    uniforms.u_resolution.value.x = renderer.domElement.width*4;
    uniforms.u_resolution.value.y = renderer.domElement.height*4;
//            uniforms.u_size.valё ue.x = renderer.domElement.width;
//            uniforms.u_size.value.y = renderer.domElement.height;
    uniforms.u_mouse.value.x = mouse.x;
    uniforms.u_mouse.value.y = mouse.y;
}
function animate() {
    requestAnimationFrame( animate );
    render();
}
function render() {
    uniforms.u_time.value += 0.05;
    renderer.render( scene, camera );
}

document.addEventListener('click',function(){
    console.log('yesyyy');
    var tl = new TimelineMax();
    console.log(tl);

    tl
        .to(uniforms.u_animation, 3, {value:1, ease: Power3.easeInOut})
});

function loaderPromise(url) {
    return new Promise(function(resolve, reject) {
        loader.load( url,
            function ( texture ) {
                resolve(texture);
            });
    });

}