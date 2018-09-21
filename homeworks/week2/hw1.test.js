var stars = require('./hw1')

function test1() {
  expect(stars(1)).toEqual(['*']);  //第一種funtion寫法
}

describe("hw1", function () {
  test("should return correct answer when n = 1", test1)
  test("should return correct answer when n = 3", function () {
    expect(stars(3)).toEqual(["*", "**", "***"]);  //第二種function寫法
  })
})