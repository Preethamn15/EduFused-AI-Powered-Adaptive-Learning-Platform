<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DSA Roadmap</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      color: #fff;
      padding: 2rem;
    }

    h2 {
      text-align: center;
      font-size: 2.5rem;
      margin-bottom: 2rem;
      color: #ffeaa7;
    }

    .timeline {
      position: relative;
      max-width: 900px;
      margin: auto;
    }

    .timeline::after {
      content: '';
      position: absolute;
      width: 4px;
      background-color: #fff;
      top: 0;
      bottom: 0;
      left: 50%;
      margin-left: -2px;
    }

    .container {
      padding: 20px 30px;
      position: relative;
      background-color: inherit;
      width: 50%;
    }

    .left {
      left: 0;
    }

    .right {
      left: 50%;
    }

    .content {
      padding: 20px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(8px);
      position: relative;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
    }

    .container::after {
      content: "📍";
      position: absolute;
      width: 20px;
      height: 20px;
      right: -10px;
      background-color: #ffeaa7;
      border-radius: 50%;
      top: 30px;
      z-index: 1;
    }

    .right::after {
      left: -10px;
    }

    .container h3 {
      margin-top: 0;
      color: #fdcb6e;
    }

    @media screen and (max-width: 768px) {
      .timeline::after {
        left: 90px;
      }

      .container {
        width: 100%;
        padding-left: 120px;
        padding-right: 25px;
      }

      .container::after {
        left: 85px;
      }

      .right {
        left: 0%;
      }
    }
  </style>
</head>
<body>
  <h2>🚀 DSA Roadmap - Step-by-Step</h2>
  <div class="timeline">
    
    <div class="container left">
      <div class="content">
        <h3>1. Basics of Programming</h3>
        <p>Input/Output, Loops, Functions, Arrays, Strings, Recursion.</p>
      </div>
    </div>

    <div class="container right">
      <div class="content">
        <h3>2. Complexity Analysis</h3>
        <p>Time & Space Complexity, Big-O Notation, Best/Worst Case.</p>
      </div>
    </div>

    <div class="container left">
      <div class="content">
        <h3>3. Searching & Sorting</h3>
        <p>Binary Search, Merge Sort, Quick Sort, Counting Sort, etc.</p>
      </div>
    </div>

    <div class="container right">
      <div class="content">
        <h3>4. Basic Data Structures</h3>
        <p>Stacks, Queues, Linked Lists, Hash Maps, Sets.</p>
      </div>
    </div>

    <div class="container left">
      <div class="content">
        <h3>5. Advanced Data Structures</h3>
        <p>Trees, Binary Trees, BST, Heaps, Tries, Segment Trees.</p>
      </div>
    </div>

    <div class="container right">
      <div class="content">
        <h3>6. Graphs</h3>
        <p>BFS, DFS, Shortest Path (Dijkstra), MST (Prim/Kruskal), Topo Sort.</p>
      </div>
    </div>

    <div class="container left">
      <div class="content">
        <h3>7. Dynamic Programming</h3>
        <p>0/1 Knapsack, LCS, LIS, Matrix Chain, Tabulation vs Memoization.</p>
      </div>
    </div>

    <div class="container right">
      <div class="content">
        <h3>8. Backtracking & Recursion</h3>
        <p>Sudoku Solver, N-Queens, Permutations, Subsets, Combinations.</p>
      </div>
    </div>

    <div class="container left">
      <div class="content">
        <h3>9. Practice + Mock Tests</h3>
        <p>Codeforces, Leetcode, EduFused Quizzes, and Topic-wise Tests.</p>
      </div>
    </div>
    
  </div>
</body>
</html>