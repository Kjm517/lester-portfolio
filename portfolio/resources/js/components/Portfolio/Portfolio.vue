<template>
    <div class="w-full h-[320vw] md:h-[63vw] bg-black p-6 md:p-20 overflow-hidden">
      <div class="text-4xl md:text-7xl font-bold text-white">My Portfolio</div>
  
      <div class="mt-10 md:mt-20 flex flex-col md:flex-row">
        <div class="relative md:w-1/2 p-2">
          <div class="hidden md:block">
            <div class="absolute flex gap-8 flex-col md:left-[-3.5vw] md:top-[13vw]">
              <img src="../../../../public/up.svg" alt="up" class="w-[3vw] hover:scale-110 hover:opacity-60 active:scale-95 transition-all duration-200" @click="scrollUp">
              <img src="../../../../public/down.svg" alt="down" class="w-[3vw] hover:scale-110 hover:opacity-60 active:scale-95 transition-all duration-200" @click="scrollDown">
            </div>  
          </div>
          <div class="space-y-10 md:space-y-20 overflow-y-auto snap-y snap-mandatory" style="max-height: calc(3 * 250px);" @scroll="handleScroll" ref="carousel">
            <div v-for="(project, index) in projects" :key="index" class="relative flex items-start group pb-10 md:pb-20 cursor-pointer snap-center" @click="selectProject(index)">
              <div class="relative z-10 flex items-center justify-center rounded-full transition-all duration-300" :class="[ index === selectedProject ? 'h-[60px] w-[60px] md:h-[80px] md:w-[80px] bg-emerald-400' : 'h-[50px] w-[50px] md:h-[60px] md:w-[60px] bg-emerald-900',]">
                <span class="text-xl md:text-2xl font-bold text-white" :class="index === selectedProject ? 'scale-110' : 'scale-100'">
                  {{ index + 1 }}
                </span>
              </div>
              <div class="ml-6 md:ml-16 flex-1 transition-all duration-300" :class="[index === selectedProject ? 'opacity-100 text-white scale-100' : 'opacity-50 text-gray-600 scale-90',]">
                <h2 class="text-2xl md:text-4xl font-bold">
                  {{ project.title }}
                </h2>
                <div class="text-base md:text-xl mt-2 md:mt-4 whitespace-pre-line">
                  {{ project.description }}
                </div>
              </div>
            </div>
          </div>
        </div>
  
        <div class="relative mt-10 md:mt-0 md:w-1/2">
          <div class="absolute md:top-[67vh] top-[34vh] z-20 flex justify-center md:justify-start">
            <div class="flex flex-row gap-2 md:gap-4">
              <div v-for="(hex, index) in projects[selectedProject].hexes" :key="index" class="text-center">
                <img src="../../../../public/hexW.svg" alt="hex" class="w-[20vw] md:w-[10vw]">
                <span class="text-white text-sm md:text-base mt-1 block">{{ hex }}</span>
              </div>
            </div>
          </div>
          <transition name="fade" mode="out-in">
            <div class="absolute top-0 w-[90vw] md:w-[45vw] z-10 mx-auto md:mx-0" :key="selectedProject">
              <img :src="projects[selectedProject].image" alt="Project Image" class="rounded-2xl">
            </div>
          </transition>
          <div class="absolute top-[10vw] left-[5vw] md:top-[5vw] md:left-[5vw]">
            <div class="w-[90vw] h-[90vw] md:w-[45vw] md:h-[45vw] bg-teal-300"></div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
    export default{
      data(){
        return{
          selectedProject: 0,
          projects:[
            {
              title: "NATIVECAMP. WEB / IOS",
              description:
                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
              image: "../../../../public/dummy1.png",
              hexes: ["Vue.js", "Tailwind CSS", "Node.js"],
            },
            {
              title: "NATIVECAMP. WEB / IOS",
              description:
                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
              image: "../../../../public/dummy1.png",
              hexes: ["React", "Bootstrap", "HTML"],
            },
            {
              title: "NATIVECAMP. WEB / IOS",
              description:
                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
              image: "../../../../public/dummy1.png",
              hexes: ["C++", "Javascript", "MySQL"],
            },
            {
              title: "NATIVECAMP. WEB / IOS",
              description:
                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
              image: "../../../../public/dummy1.png",
              hexes: ["PHP", "Tailwind CSS", "Laravel"],
            },
            {
              title: "NATIVECAMP. WEB / IOS",
              description:
                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
              image: "../../../../public/dummy1.png",
              hexes: ["HTML", "Bootstrap", "Python"],
            },
            {
              title: "NATIVECAMP. WEB / IOS",
              description:
                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
              image: "../../../../public/dummy1.png",
              hexes: ["HTML", "Bootstrap", "Python"],
            },
            {
              title: "NATIVECAMP. WEB / IOS",
              description:
                "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.",
              image: "../../../../public/dummy1.png",
              hexes: ["HTML", "Bootstrap", "Python"],
            },
          ],
          isTouching: false,
          startTouchY: 0,
          scrollStart: 0,
        };
      },
      methods: {
        selectProject(index){
          this.selectedProject=index;
          const carousel=this.$refs.carousel;
          const item=carousel.querySelectorAll(".snap-center")[index];
          carousel.scrollTo({
            top: item.offsetTop-carousel.offsetHeight/2+item.offsetHeight/2,
            behavior:"smooth",
          });
        },
        handleScroll(){
          const carousel= this.$refs.carousel;
          const items= carousel.querySelectorAll(".snap-center");
          const scrollTop= carousel.scrollTop;
          const scrollHeight=carousel.scrollHeight;
          const clientHeight= carousel.clientHeight;
  
          if (scrollTop <= 0){
            this.selectedProject=0;
            return;
          }
  
          if (Math.ceil(scrollTop + clientHeight) >= scrollHeight) {
            this.selectedProject = items.length - 1;
            return;
          }
  
          let closestIndex=0;
          let closestDistance=Infinity;
  
          items.forEach((item,index) => {
            const itemTop = item.offsetTop-scrollTop;
            const distance = Math.abs(itemTop-clientHeight/2);
  
            if (distance<closestDistance) {
              closestDistance=distance;
              closestIndex=index;
            }
          });
  
          this.selectedProject = closestIndex;
        },
        startTouch(event){
          this.isTouching = true;
          this.startTouchY= event.touches[0].clientY;
          this.scrollStart= this.$refs.carousel.scrollTop;
        },
        moveTouch(event){
          if (!this.isTouching) return;
          const currentY=event.touches[0].clientY;
          const deltaY=this.startTouchY- currentY;
          this.$refs.carousel.scrollTop= this.scrollStart + deltaY;
        },
        endTouch(){
          this.isTouching = false;
           this.handleScroll();
        },
        scrollUp(){
          if (this.selectedProject>0) {
            this.selectedProject--;
            this.selectProject(this.selectedProject);
          }
        },
        scrollDown(){
          if (this.selectedProject<this.projects.length-1) {
            this.selectedProject++;
            this.selectProject(this.selectedProject);
          }
        }
      },
    };
  </script>
  
  <style>
    .fade-enter-active,
    .fade-leave-active {
      transition:opacity 0.5s;
    }
    .fade-enter,
    .fade-leave-to {
      opacity: 0;
    }
    .snap-center {
      scroll-snap-align: center;
    }
  </style>