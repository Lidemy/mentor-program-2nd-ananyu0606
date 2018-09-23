var isPalindromes = require('./hw4')

describe("hw4", function () {
  it("should return correct answer when str = abcdcba", function () {
    expect(isPalindromes('abcdcba')).toBe(true)
  })
  it("should return correct answer when str= @@@", function (){
    expect(isPalindromes('@@@')).toBe(true)
  })
  it("shoule return correct answer when str = aaaaa", function(){
    expect(isPalindromes('aaaaa')).toBe(true)
  })
})